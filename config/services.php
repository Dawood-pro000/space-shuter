<?php
// config/services.php
// Project Vision - External API Service Configurations
require_once __DIR__ . '/env_loader.php';

return [
    'supabase' => [
        'url' => getenv('SUPABASE_URL'),
        'anon_key' => getenv('SUPABASE_ANON_KEY'),
        'service_key' => getenv('SUPABASE_SERVICE_ROLE_KEY')
    ],
    'nasa' => [
        'general_key' => getenv('NASA_GENERAL_API_KEY'), // Form portal key
        'ads_token'   => getenv('NASA_ADS_BEARER_TOKEN') // ADS token key
    ],
    'gemini' => [
        'keys' => [
            getenv('GEMINI_API_KEY_1'),
            getenv('GEMINI_API_KEY_2'),
            getenv('GEMINI_API_KEY_3')
        ],
        'model' => 'gemini-1.5-flash' // High-speed processing variant
    ]
];
