<?php
// config/api.php

require_once __DIR__ . '/env_loader.php';

function fetchSupabase($table, $query = '', $method = 'GET', $body = null) {
    $url = rtrim(getenv('SUPABASE_URL'), '/') . '/rest/v1/' . $table . ($query ? '?' . $query : '');
    $key = getenv('SUPABASE_ANON_KEY');

    $ch = curl_init($url);
    
    $headers = [
        "apikey: {$key}",
        "Authorization: Bearer {$key}",
        "Content-Type: application/json"
    ];

    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        if ($body) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
            $headers[] = "Prefer: return=representation";
        }
    } elseif ($method !== 'GET') {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        if ($body) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        }
    }

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode >= 200 && $httpCode < 300) {
        return json_decode($response, true);
    }
    
    return null;
}
