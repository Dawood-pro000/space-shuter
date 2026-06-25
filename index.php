<?php
// index.php - Master Front Controller
session_start();

// Enable error reporting for development
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Load Composer Autoloader
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

// Simple Autoloader (optional, if we use classes heavily)
spl_autoload_register(function ($class_name) {
    $directories = ['services/', 'models/', 'utilities/', 'middleware/'];
    foreach ($directories as $directory) {
        $file = __DIR__ . '/' . $directory . $class_name . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Load Env
require_once __DIR__ . '/config/env_loader.php';

// Parse URI
$request_uri = $_SERVER['REQUEST_URI'];
$path = parse_url($request_uri, PHP_URL_PATH);

// Remove base path if running in a subdirectory
$base_path = '/space-shuter';
if (strpos($path, $base_path) === 0) {
    $path = substr($path, strlen($base_path));
}
if ($path !== '/') {
    $path = rtrim($path, '/');
}
if ($path === '' || $path === false) {
    $path = '/';
}

// Route Map
$routes = [
    // Webhooks & API
    '/api/stripe-webhook' => 'api/stripe-webhook.php',

    // Public Web
    '/' => 'pages/public/home.php',
    '/discover' => 'pages/public/discover.php',
    '/planet' => 'pages/public/planet.php',
    '/pricing' => 'pages/public/pricing.php',
    '/about' => 'pages/public/about.php',
    '/contact' => 'pages/public/contact.php',
    '/privacy' => 'pages/public/privacy.php',
    '/checkout' => 'pages/public/checkout.php',
    '/success' => 'pages/public/success.php',

    // Auth
    '/register' => 'pages/auth/register.php',
    '/login' => 'pages/auth/login.php',
    '/logout' => 'pages/auth/logout.php',
    '/reset-password' => 'pages/auth/reset-password.php',

    // User Protected
    '/feed' => 'pages/user/feed.php',
    '/study-planner' => 'pages/user/study-planner.php',
    '/journey' => 'pages/user/journey.php',
    '/library' => 'pages/user/library.php',
    '/saved' => 'pages/user/saved.php',
    '/profile' => 'pages/user/profile.php',
    '/settings' => 'pages/user/settings.php',
    '/subscription' => 'pages/user/subscription.php',
    '/assistant' => 'pages/user/assistant.php',

    // Admin Protected
    '/admin' => 'pages/admin/dashboard.php',
    '/admin/posts' => 'pages/admin/posts.php',
    '/admin/users' => 'pages/admin/users.php',
    '/admin/subscriptions' => 'pages/admin/subscriptions.php',
    '/admin/books' => 'pages/admin/books.php',
    '/admin/categories' => 'pages/admin/categories.php',
    '/admin/contacts' => 'pages/admin/contacts.php',
    '/admin/logs' => 'pages/admin/logs.php',
    '/admin/settings' => 'pages/admin/settings.php',
    '/admin/ai' => 'pages/admin/ai-control.php'
];

// Routing Logic
if (array_key_exists($path, $routes)) {
    $file_to_load = __DIR__ . '/' . $routes[$path];
    
    // Apply Middleware
    if (strpos($path, '/admin') === 0) {
        require_once __DIR__ . '/middleware/AuthMiddleware.php';
        require_once __DIR__ . '/middleware/AdminMiddleware.php';
        AuthMiddleware::check();
        AdminMiddleware::check();
    } elseif (strpos($path, '/feed') === 0 || strpos($path, '/study-planner') === 0 || strpos($path, '/journey') === 0 || strpos($path, '/library') === 0 || strpos($path, '/saved') === 0 || strpos($path, '/profile') === 0 || strpos($path, '/settings') === 0 || strpos($path, '/assistant') === 0) {
        require_once __DIR__ . '/middleware/AuthMiddleware.php';
        AuthMiddleware::check();
    }
    
    // Load Page
    if (file_exists($file_to_load)) {
        require $file_to_load;
    } else {
        http_response_code(404);
        echo "404 - Page View File Not Created Yet. ($file_to_load)";
    }
} elseif (preg_match('/^\/article\/(.+)$/', $path, $matches)) {
    $_GET['slug'] = $matches[1];
    require __DIR__ . '/pages/user/article.php';
} else {
    // 404 Not Found
    http_response_code(404);
    echo "404 - Route Not Found.";
}
