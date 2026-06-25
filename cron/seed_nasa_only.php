<?php
// cron/seed_nasa_only.php
// Seed script using ONLY NASA API (no Gemini AI)
// Usage: php cron/seed_nasa_only.php

require_once __DIR__ . '/../config/services.php';
$services = require __DIR__ . '/../config/services.php';

$nasaKey        = $services['nasa']['general_key'];
$supabaseUrl    = rtrim($services['supabase']['url'], '/');
$supabaseKey    = $services['supabase']['service_key'];

if (!$nasaKey || !$supabaseUrl || !$supabaseKey) {
    die("❌ Missing NASA or Supabase API keys.\n");
}

echo "🚀 Fetching 5 random space articles directly from NASA APOD (with retry)...\n\n";

$nasaResponse = false;
$httpCode = 0;
$maxRetries = 3;

for ($attempt = 1; $attempt <= $maxRetries; $attempt++) {
    // Fetch 5 random articles from NASA APOD
    $apodUrl = "https://api.nasa.gov/planetary/apod?api_key={$nasaKey}&count=5";
    $ch = curl_init($apodUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $nasaResponse = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode === 200 && $nasaResponse) {
        break; // Success
    }
    
    echo "  ⚠️ Attempt {$attempt} failed (HTTP {$httpCode}). Retrying in 2 seconds...\n";
    sleep(2);
}

if ($httpCode !== 200 || !$nasaResponse) {
    die("❌ NASA API Error after retries (HTTP $httpCode): " . $nasaResponse . "\n");
}

$nasaData = json_decode($nasaResponse, true);
$successCount = 0;

foreach ($nasaData as $i => $item) {
    $num = $i + 1;
    $title = $item['title'] ?? 'Space Discovery';
    echo "📡 [{$num}/10] Formatting: {$title}\n";

    // Format raw text into HTML manually (Simulating AI behavior)
    $rawText = $item['explanation'] ?? 'No explanation provided.';
    
    // Create an abstract (first sentence or two)
    $sentences = explode('. ', $rawText);
    $abstract = (isset($sentences[0]) ? $sentences[0] . '.' : '') . (isset($sentences[1]) ? ' ' . $sentences[1] . '.' : '');
    
    // Beautify the content into HTML paragraphs
    $content = "<div class='space-article-content'>\n";
    
    // Add an introductory bold paragraph
    $content .= "  <p class='text-lg font-medium text-ink mb-6'><strong>" . htmlspecialchars($abstract) . "</strong></p>\n";
    
    // Chunk the rest into paragraphs
    $chunks = array_chunk($sentences, 3);
    foreach ($chunks as $index => $chunk) {
        if ($index === 0) continue; // Skip first chunk as it's our abstract
        $paragraph = implode('. ', $chunk);
        if (trim($paragraph)) {
            // Randomly bold some keywords for better reading experience
            $paragraph = preg_replace('/\b(stars|galaxy|universe|telescope|Earth|Sun|Moon|NASA|space)\b/i', '<strong>$1</strong>', htmlspecialchars(trim($paragraph)));
            
            // Fix trailing dots
            if (substr($paragraph, -1) !== '.') $paragraph .= '.';
            $content .= "  <p class='mb-4 text-slate leading-relaxed'>{$paragraph}</p>\n";
        }
    }
    $content .= "</div>";

    // Setup payload
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title), '-')) . '-' . time() . '-' . $num;
    $imageUrl = $item['url'] ?? '';
    if (isset($item['media_type']) && $item['media_type'] === 'video') {
        $imageUrl = $item['thumbnail_url'] ?? 'https://apod.nasa.gov/apod/image/2401/M42_JWST_960.jpg'; // fallback
    }

    $post = [
        'title'        => $title,
        'slug'         => $slug,
        'abstract'     => htmlspecialchars($abstract),
        'content'      => $content,
        'image_url'    => $imageUrl,
        'status'       => 'published',
        'publish_date' => date('c', strtotime("-{$i} days")),
    ];

    // Insert into Supabase
    $ch = curl_init("{$supabaseUrl}/rest/v1/posts");
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => json_encode($post),
        CURLOPT_HTTPHEADER     => [
            "apikey: {$supabaseKey}",
            "Authorization: Bearer {$supabaseKey}",
            "Content-Type: application/json",
            "Prefer: return=representation"
        ],
        CURLOPT_TIMEOUT => 15,
    ]);
    $resp = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($code >= 200 && $code < 300) {
        echo "  ✅ Inserted successfully.\n";
        $successCount++;
    } else {
        echo "  ❌ Failed to insert. HTTP $code\n";
    }
}

echo "\n🎉 Done! {$successCount}/10 posts populated using NASA APOD.\n";
