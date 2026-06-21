<?php
// cron/fetch_nasa_data.php

require_once __DIR__ . '/../config/services.php';

$services = require __DIR__ . '/../config/services.php';

$nasaKey = $services['nasa']['general_key'];
$geminiKey = $services['gemini']['keys'][0]; // use first key for simplicity
$supabaseUrl = rtrim($services['supabase']['url'], '/');
$supabaseServiceKey = $services['supabase']['service_key'];

// 1. Fetch from NASA APOD
$apodUrl = "https://api.nasa.gov/planetary/apod?api_key={$nasaKey}";
$ch = curl_init($apodUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$nasaResponse = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode !== 200 || !$nasaResponse) {
    die("Error fetching NASA data.\n");
}

$nasaData = json_decode($nasaResponse, true);

if (!isset($nasaData['title']) || !isset($nasaData['explanation'])) {
    die("Invalid NASA data format.\n");
}

$title = $nasaData['title'];
$abstract = $nasaData['explanation'];
$imageUrl = $nasaData['url'] ?? '';
$author = $nasaData['copyright'] ?? 'NASA';
$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title), '-')) . '-' . time();
$category = 'space';

// 2. Beautify with Gemini
$geminiUrl = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$geminiKey}";
$prompt = "You are an expert science writer. Take the following astronomical abstract and rewrite it into an engaging, beautifully formatted HTML article (using headings, paragraphs, and lists if appropriate). Do not include the title in the HTML, just the content body.\n\nAbstract:\n" . $abstract;

$geminiPayload = json_encode([
    "contents" => [
        [
            "parts" => [
                ["text" => $prompt]
            ]
        ]
    ]
]);

$ch = curl_init($geminiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $geminiPayload);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
$geminiResponse = curl_exec($ch);
curl_close($ch);

$geminiData = json_decode($geminiResponse, true);
$beautifiedContent = $geminiData['candidates'][0]['content']['parts'][0]['text'] ?? $abstract; // Fallback to abstract

// 3. Insert into Supabase
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
    echo "Successfully inserted article: {$title}\n";
} else {
    echo "Failed to insert into Supabase: {$supabaseResponse}\n";
}
