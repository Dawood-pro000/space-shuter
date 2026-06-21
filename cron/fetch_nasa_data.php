<?php
// cron/fetch_nasa_data.php

require_once __DIR__ . '/../config/services.php';

$services = require __DIR__ . '/../config/services.php';

$nasaKey = $services['nasa']['general_key'];
$geminiKey1 = $services['gemini']['keys'][0] ?? null; // Key #1: Ingestion Architect
$geminiKey2 = $services['gemini']['keys'][1] ?? null; // Key #2: Creative Director
$supabaseUrl = rtrim($services['supabase']['url'], '/');
$supabaseServiceKey = $services['supabase']['service_key'];

if (!$geminiKey1 || !$geminiKey2) {
    die("Error: Missing Gemini API keys for the dual-agent pipeline.\n");
}

/**
 * Helper to call Gemini and force a JSON response
 */
function callGemini($prompt, $apiKey, $systemInstruction) {
    $geminiUrl = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$apiKey}";
    
    $payload = [
        "contents" => [
            [
                "parts" => [
                    ["text" => $prompt]
                ]
            ]
        ],
        "systemInstruction" => [
            "parts" => [
                ["text" => $systemInstruction]
            ]
        ],
        "generationConfig" => [
            "responseMimeType" => "application/json"
        ]
    ];
    
    $ch = curl_init($geminiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($httpCode !== 200) {
        return null;
    }
    
    $data = json_decode($response, true);
    $text = $data['candidates'][0]['content']['parts'][0]['text'] ?? '{}';
    return json_decode($text, true);
}

echo "Starting NASA Data Fetch...\n";

// 1. Fetch from NASA APOD
$apodUrl = "https://api.nasa.gov/planetary/apod?api_key={$nasaKey}";
$ch = curl_init($apodUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$nasaResponse = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode !== 200 || !$nasaResponse) {
    die("Error fetching raw NASA data.\n");
}

echo "NASA Data Fetched. Passing to Key #1 (Ingestion Architect)...\n";

// 2. AGENT 1: Ingestion Architect
$agent1Instruction = "You are Key #1: The Ingestion Architect for Project Space Shutter. Your sole job is to parse and synthesize incoming raw text parameters from NASA data. Filter out unnecessary tracking logs. Consolidate discovery, key parameters, source author, and image URLs into a clean, compact, structured JSON object. Maintain strict data integrity. Deliver raw, accurate, filtered facts.";

$agent1Prompt = "Parse the following NASA JSON response. Return ONLY a JSON object with exact keys: 'raw_abstract' (the main explanation/facts), 'image_url', 'author' (who took the picture/wrote it, default to 'NASA' if missing), 'raw_title'.\n\nData:\n" . $nasaResponse;

$ingestedData = callGemini($agent1Prompt, $geminiKey1, $agent1Instruction);

if (!$ingestedData || !isset($ingestedData['raw_abstract'])) {
    die("Error: Key #1 (Ingestion Architect) failed to parse data properly.\n");
}

echo "Ingestion Complete. Passing to Key #2 (Creative Director)...\n";

// 3. AGENT 2: Creative Director
$agent2Instruction = "You are Key #2: The Creative Director and UI Copywriter for Project Space Shutter. You take raw factual JSON packets from Key #1 and turn them into viral, highly engaging, reader-friendly blog posts and educational materials. Output pure JSON with the final content.";

$agent2Prompt = "Take this factual JSON packet and return ONLY a JSON object with exact keys: 'headline' (exciting non-clickbait title), 'beautified_content' (rewrite the text into clean HTML components like <p> and <strong> suitable for our frontend, DO NOT put the title inside the HTML), and 'category' (e.g. aerospace, deep-space, mechanics).\n\nPacket:\n" . json_encode($ingestedData);

$creativeData = callGemini($agent2Prompt, $geminiKey2, $agent2Instruction);

if (!$creativeData || !isset($creativeData['beautified_content'])) {
    die("Error: Key #2 (Creative Director) failed to generate content properly.\n");
}

echo "Creative Content Generated. Saving to Supabase...\n";

// Prepare final payload
$title = $creativeData['headline'] ?? $ingestedData['raw_title'];
$abstract = $ingestedData['raw_abstract'];
$beautifiedContent = $creativeData['beautified_content'];
$imageUrl = $ingestedData['image_url'] ?? '';
$author = $ingestedData['author'] ?? 'NASA';
$category = $creativeData['category'] ?? 'space';
$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title), '-')) . '-' . time();

// 4. Insert into Supabase
$articlePayload = json_encode([
    'title' => $title,
    'slug' => $slug,
    'category' => $category,
    'raw_abstract' => $abstract,
    'beautified_content' => $beautifiedContent,
    'image_url' => $imageUrl,
    'source_author' => $author
]);

$supabaseEndpoint = "{$supabaseUrl}/rest/v1/articles";
$ch = curl_init($supabaseEndpoint);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $articlePayload);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "apikey: {$supabaseServiceKey}",
    "Authorization: Bearer {$supabaseServiceKey}",
    "Content-Type: application/json",
    "Prefer: return=representation"
]);

$supabaseResponse = curl_exec($ch);
$supabaseHttpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($supabaseHttpCode >= 200 && $supabaseHttpCode < 300) {
    echo "SUCCESS: Article '{$title}' generated by AI pipeline and inserted into Supabase!\n";
} else {
    echo "Failed to insert into Supabase: {$supabaseResponse}\n";
}
