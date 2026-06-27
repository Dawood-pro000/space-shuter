<?php
require_once __DIR__ . '/config/env_loader.php';
$apiKey = getenv('GROQ_API_KEY');
echo "GROQ Key: $apiKey\n";
$isGroq = strpos($apiKey, 'gsk_') === 0;
echo "Is Groq: " . ($isGroq ? 'yes' : 'no') . "\n";

$url = $isGroq ? 'https://api.groq.com/openai/v1/chat/completions' : 'https://openrouter.ai/api/v1/chat/completions';
$model = $isGroq ? 'llama3-8b-8192' : 'google/gemini-2.5-flash';

$data = [
    'model' => $model,
    'max_tokens' => 100,
    'messages' => [
        [
            'role' => 'user',
            'content' => 'Hello'
        ]
    ]
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$headers = [
    'Authorization: Bearer ' . $apiKey,
    'Content-Type: application/json'
];

if (!$isGroq) {
    $headers[] = 'HTTP-Referer: https://spaceshutter.edu';
    $headers[] = 'X-Title: Space Shutter';
}

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // For local testing

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
curl_close($ch);

echo "HTTP Code: $httpCode\n";
echo "Response: $response\n";
echo "Error: $error\n";
