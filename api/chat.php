<?php
// api/chat.php
session_start();
require_once __DIR__ . '/../config/env_loader.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);
$userMessage = $input['message'] ?? '';

if (empty($userMessage)) {
    http_response_code(400);
    echo json_encode(['error' => 'Message is required']);
    exit;
}

$apiKey = getenv('GROQ_API_KEY') ?: getenv('OPENROUTER_API_KEY');
if (!$apiKey) {
    http_response_code(500);
    echo json_encode(['error' => 'API Key not configured']);
    exit;
}

// Determine if we are using Groq or OpenRouter based on key prefix
$isGroq = strpos($apiKey, 'gsk_') === 0;

$url = $isGroq ? 'https://api.groq.com/openai/v1/chat/completions' : 'https://openrouter.ai/api/v1/chat/completions';
$model = $isGroq ? 'llama-3.3-70b-versatile' : 'google/gemini-2.5-flash';

$data = [
    'model' => $model,
    'max_tokens' => 1000,
    'messages' => [
        [
            'role' => 'system',
            'content' => 'You are EVA, an advanced AI space assistant for the Space Shutter educational platform. You are highly knowledgeable about astronomy, NASA missions, the universe, and physics. You respond in a professional, slightly futuristic, and helpful sci-fi tone. Keep answers relatively concise and engaging.'
        ],
        [
            'role' => 'user',
            'content' => $userMessage
        ]
    ]
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Prevent SSL errors on local servers

$headers = [
    'Authorization: Bearer ' . $apiKey,
    'Content-Type: application/json'
];

if (!$isGroq) {
    $headers[] = 'HTTP-Referer: https://spaceshutter.edu';
    $headers[] = 'X-Title: Space Shutter';
}

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode === 200) {
    $result = json_decode($response, true);
    if (isset($result['choices'][0]['message']['content'])) {
        echo json_encode([
            'reply' => $result['choices'][0]['message']['content']
        ]);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Invalid response from AI']);
    }
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to connect to AI provider', 'details' => $response]);
}
