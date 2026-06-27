<?php
// pages/auth/logout.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Clear all session data
$_SESSION = [];
// Destroy the session cookie
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params['path'], $params['domain'],
        $params['secure'], $params['httponly']
    );
}
session_destroy();
header('Location: /space-shuter/');
exit;
require_once __DIR__ . '/../../layouts/header.php';
?>

<main class="pt-32 pb-24 px-8 min-h-[80vh] max-w-6xl mx-auto">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-4xl font-semibold text-ink tracking-tight mb-6">Logging Out...</h1>
        <div class="bg-canvas rounded-lg border border-hairline p-8">
            <p class="text-slate text-sm">This page is under construction.</p>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
