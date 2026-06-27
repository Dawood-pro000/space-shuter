<?php
require_once __DIR__ . '/config/env_loader.php';

$apiKey = getenv('OPENROUTER_API_KEY');
if (!$apiKey) {
    die("No API Key\n");
}

$url = 'https://openrouter.ai/api/v1/chat/completions';
$data = [
    'model' => 'mistralai/mistral-7b-instruct:free',
    'messages' => [
        ['role' => 'user', 'content' => 'Say hello in one word!']
    ]
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $apiKey,
    'HTTP-Referer: https://spaceshutter.edu',
    'X-Title: Space Shutter Test',
    'Content-Type: application/json'
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "HTTP Code: $httpCode\n";
echo "Response: $response\n";
