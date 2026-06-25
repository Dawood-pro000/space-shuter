<?php
// Test AQ. key with Bearer token auth + different models/endpoints

$key = 'AQ.Ab8RN6I_xvXS8c9iVpZHbZGYltAWPzS0lnfwNaI-feugdCleKw';

$models = [
    'gemini-2.0-flash',
    'gemini-1.5-flash',
    'gemini-pro',
    'gemini-2.5-flash',
];

$versions = ['v1beta', 'v1'];

echo "Testing AQ. key with Bearer token + multiple models...\n\n";

foreach ($versions as $ver) {
    foreach ($models as $model) {
        $url = "https://generativelanguage.googleapis.com/{$ver}/models/{$model}:generateContent";
        $payload = json_encode([
            'contents' => [['parts' => [['text' => 'Say hello']]]]
        ]);

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $payload,
            CURLOPT_HTTPHEADER     => [
                'Content-Type: application/json',
                "Authorization: Bearer {$key}",   // OAuth style
            ],
            CURLOPT_TIMEOUT => 10,
        ]);
        $resp = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $data = json_decode($resp, true);

        if ($code === 200) {
            $reply = $data['candidates'][0]['content']['parts'][0]['text'] ?? '';
            echo "✅ WORKING! [{$ver}] [{$model}]\n";
            echo "   Reply: " . trim($reply) . "\n\n";
        } else {
            $msg = $data['error']['message'] ?? "HTTP $code";
            echo "❌ [{$ver}] [{$model}] — " . substr($msg, 0, 70) . "\n";
        }
    }
}

echo "\n--- Also testing ?key= param style ---\n";
foreach (['v1beta', 'v1'] as $ver) {
    $url = "https://generativelanguage.googleapis.com/{$ver}/models/gemini-2.0-flash:generateContent?key={$key}";
    $payload = json_encode(['contents' => [['parts' => [['text' => 'Say hello']]]]]);
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => $payload,
        CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
        CURLOPT_TIMEOUT        => 10,
    ]);
    $resp = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    $data = json_decode($resp, true);
    $msg  = $code === 200
        ? "✅ WORKING — " . trim($data['candidates'][0]['content']['parts'][0]['text'] ?? '')
        : "❌ " . substr($data['error']['message'] ?? "HTTP $code", 0, 70);
    echo "[?key= | {$ver}] gemini-2.0-flash: $msg\n";
}
