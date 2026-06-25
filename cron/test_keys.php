<?php
// cron/test_keys.php — Test all API keys
require_once __DIR__ . '/../config/env_loader.php';

echo "===========================================\n";
echo "  Space Shutter — API Key Diagnostic\n";
echo "===========================================\n\n";

// ─── GEMINI KEYS ─────────────────────────────
$geminiKeys = [
    'GEMINI_API_KEY_1' => getenv('GEMINI_API_KEY_1'),
    'GEMINI_API_KEY_2' => getenv('GEMINI_API_KEY_2'),
    'GEMINI_API_KEY_3' => getenv('GEMINI_API_KEY_3'),
];

echo "--- GEMINI KEYS ---\n";
foreach ($geminiKeys as $name => $key) {
    if (!$key) {
        echo "[$name] ❌ NOT SET in .env\n";
        continue;
    }

    echo "[$name] prefix=" . substr($key, 0, 10) . "...  ";

    $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$key}";
    $payload = json_encode([
        "contents" => [["parts" => [["text" => "Reply with exactly one word: Hello"]]]]
    ]);

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => $payload,
        CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
        CURLOPT_TIMEOUT        => 15,
    ]);
    $resp = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $data = json_decode($resp, true);

    if ($code === 200) {
        $reply = $data['candidates'][0]['content']['parts'][0]['text'] ?? '(empty)';
        echo "✅ WORKING — Response: " . trim($reply) . "\n";
    } else {
        $msg = $data['error']['message'] ?? "HTTP $code";
        echo "❌ FAILED — " . substr($msg, 0, 80) . "\n";
    }
}

echo "\n--- NASA KEYS ---\n";

// NASA General API Key (APOD etc.)
$nasaKey = getenv('NASA_GENERAL_API_KEY');
if (!$nasaKey) {
    echo "[NASA_GENERAL_API_KEY] ❌ NOT SET\n";
} else {
    echo "[NASA_GENERAL_API_KEY] prefix=" . substr($nasaKey, 0, 8) . "...  ";
    $ch = curl_init("https://api.nasa.gov/planetary/apod?api_key={$nasaKey}");
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 15,
    ]);
    $resp = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $data = json_decode($resp, true);
    if ($code === 200 && isset($data['title'])) {
        echo "✅ WORKING — Today: \"{$data['title']}\"\n";
    } else {
        $msg = $data['error']['message'] ?? $data['msg'] ?? "HTTP $code";
        echo "❌ FAILED — $msg\n";
    }
}

// NASA ADS Bearer Token
$adsToken = getenv('NASA_ADS_BEARER_TOKEN');
if (!$adsToken) {
    echo "[NASA_ADS_BEARER_TOKEN] ❌ NOT SET\n";
} else {
    echo "[NASA_ADS_BEARER_TOKEN] prefix=" . substr($adsToken, 0, 8) . "...  ";
    $ch = curl_init("https://api.adsabs.harvard.edu/v1/search/query?q=star&rows=1&fl=title");
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER     => ["Authorization: Bearer {$adsToken}"],
        CURLOPT_TIMEOUT        => 15,
    ]);
    $resp = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $data = json_decode($resp, true);
    if ($code === 200 && isset($data['response'])) {
        $numFound = $data['response']['numFound'] ?? 0;
        echo "✅ WORKING — Found {$numFound} results\n";
    } else {
        echo "❌ FAILED — HTTP $code\n";
    }
}

echo "\n===========================================\n";
