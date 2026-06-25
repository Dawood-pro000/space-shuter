<?php
// cron/seed_posts.php
// Run this ONCE to populate posts table with AI-generated content
// Usage: php cron/seed_posts.php

require_once __DIR__ . '/../config/services.php';
$services = require __DIR__ . '/../config/services.php';

$geminiKey1     = $services['gemini']['keys'][0] ?? null;
$geminiKey2     = $services['gemini']['keys'][1] ?? null;
$supabaseUrl    = rtrim($services['supabase']['url'], '/');
$supabaseKey    = $services['supabase']['service_key'];

if (!$geminiKey1 || !$geminiKey2 || !$supabaseUrl || !$supabaseKey) {
    die("❌ Missing API keys. Check your .env file.\n");
}

// ─── Gemini Helper ──────────────────────────────────────────────────────────
function callGemini(string $prompt, string $apiKey, string $systemInstruction): ?array {
    $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$apiKey}";
    $payload = json_encode([
        "contents"         => [["parts" => [["text" => $prompt]]]],
        "systemInstruction"=> ["parts" => [["text" => $systemInstruction]]],
        "generationConfig" => ["responseMimeType" => "application/json"]
    ]);

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => $payload,
        CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
        CURLOPT_TIMEOUT        => 30,
    ]);
    $response = curl_exec($ch);
    $code     = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($code !== 200) {
        echo "  Gemini HTTP Error: $code\n";
        return null;
    }
    $data = json_decode($response, true);
    $text = $data['candidates'][0]['content']['parts'][0]['text'] ?? '{}';
    return json_decode($text, true);
}

// ─── Supabase Insert ─────────────────────────────────────────────────────────
function insertPost(array $post, string $supabaseUrl, string $key): bool {
    $ch = curl_init("{$supabaseUrl}/rest/v1/posts");
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => json_encode($post),
        CURLOPT_HTTPHEADER     => [
            "apikey: {$key}",
            "Authorization: Bearer {$key}",
            "Content-Type: application/json",
            "Prefer: return=representation"
        ],
        CURLOPT_TIMEOUT => 15,
    ]);
    $resp = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($code >= 200 && $code < 300) return true;
    echo "  Supabase Error ($code): $resp\n";
    return false;
}

// ─── Topics to generate posts for ───────────────────────────────────────────
$topics = [
    "James Webb Space Telescope latest deep field images and what they reveal about the early universe",
    "SpaceX Starship orbital flight milestones and the future of Mars colonization",
    "NASA Artemis program - returning humans to the Moon and building lunar Gateway",
    "Black hole mergers detected by LIGO gravitational wave observatory",
    "The discovery of exoplanets in the habitable zone using the Kepler and TESS missions",
    "Solar flares and coronal mass ejections - how space weather affects Earth",
    "The Voyager probes at the edge of interstellar space - 46 years of data",
    "Mars water ice discovery and what it means for future human settlement",
    "Dark matter and dark energy - the invisible scaffolding of the cosmos",
    "The Parker Solar Probe touching the Sun's corona - revolutionary findings",
];

echo "🚀 Space Shutter Post Seeder — Generating {count($topics)} posts via Gemini AI...\n\n";

$successCount = 0;
foreach ($topics as $i => $topic) {
    $num = $i + 1;
    echo "📡 [{$num}/".count($topics)."] Topic: {$topic}\n";

    // AGENT 1: Ingestion Architect
    $ingestedData = callGemini(
        "Create a detailed factual summary for this space science topic. Return ONLY a JSON object with keys: 'abstract' (2-3 sentences, factual summary), 'image_url' (leave as empty string ''), 'title' (short accurate title).\n\nTopic: {$topic}",
        $geminiKey1,
        "You are Key #1: The Ingestion Architect for Project Space Shutter. Parse and synthesize space science topics into clean, factual JSON. Be precise and data-driven."
    );

    if (!$ingestedData || empty($ingestedData['abstract'])) {
        echo "  ⚠️  Agent 1 failed, skipping.\n\n";
        continue;
    }
    echo "  ✅ Agent 1 done: '{$ingestedData['title']}'\n";

    // AGENT 2: Creative Director
    $creativeData = callGemini(
        "Transform this space science JSON into an engaging blog post. Return ONLY a JSON object with keys: 'headline' (compelling title, no clickbait), 'content' (well-formatted HTML using <p>, <h2>, <strong>, <ul> tags — minimum 300 words — do NOT include the headline inside the HTML).\n\nInput:\n" . json_encode($ingestedData),
        $geminiKey2,
        "You are Key #2: The Creative Director for Project Space Shutter. Transform raw space science facts into engaging, educational, professionally written blog content. Output clean HTML content."
    );

    if (!$creativeData || empty($creativeData['content'])) {
        echo "  ⚠️  Agent 2 failed, skipping.\n\n";
        continue;
    }
    echo "  ✅ Agent 2 done: '{$creativeData['headline']}'\n";

    $title    = $creativeData['headline'] ?? $ingestedData['title'];
    $slug     = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title), '-')) . '-' . time();
    $abstract = $ingestedData['abstract'];
    $content  = $creativeData['content'];
    $imageUrl = $ingestedData['image_url'] ?? '';

    // NASA APOD images for fallback (space photography)
    $fallbackImages = [
        'https://apod.nasa.gov/apod/image/2501/NGC253_JWST_1080.jpg',
        'https://apod.nasa.gov/apod/image/2312/Orion_JWST_960.jpg',
        'https://apod.nasa.gov/apod/image/2401/M42_JWST_960.jpg',
        'https://apod.nasa.gov/apod/image/2405/Crab_JWST_960.jpg',
        'https://apod.nasa.gov/apod/image/2310/NGC604_JWST_960.jpg',
        'https://apod.nasa.gov/apod/image/2308/CrabNebula_JWST_1080.jpg',
        'https://apod.nasa.gov/apod/image/2501/Pillars_JWST_960.jpg',
        'https://apod.nasa.gov/apod/image/2502/Cartwheel_JWST_960.jpg',
        'https://apod.nasa.gov/apod/image/2312/NGC1300_JWST_960.jpg',
        'https://apod.nasa.gov/apod/image/2401/NGC7469_JWST_960.jpg',
    ];
    if (empty($imageUrl)) {
        $imageUrl = $fallbackImages[$i % count($fallbackImages)];
    }

    $ok = insertPost([
        'title'        => $title,
        'slug'         => $slug,
        'abstract'     => $abstract,
        'content'      => $content,
        'image_url'    => $imageUrl,
        'status'       => 'published',
        'publish_date' => date('c', strtotime("-{$i} days")),
    ], $supabaseUrl, $supabaseKey);

    if ($ok) {
        echo "  🎉 Inserted: '{$title}'\n\n";
        $successCount++;
    } else {
        echo "  ❌ Insert failed.\n\n";
    }

    // Small pause between Gemini calls to avoid rate limiting
    if ($num < count($topics)) sleep(2);
}

echo "✅ Done! {$successCount}/" . count($topics) . " posts successfully seeded.\n";
echo "🌐 Visit /discover or /feed to see your posts!\n";
