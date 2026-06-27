<?php
// pages/auth/register.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../../config/env_loader.php';

$page_title = 'Create an Account | Space Shutter';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';
    $username = trim($_POST['username'] ?? '');

    if (empty($email) || empty($password)) {
        $error = "Email and password are required.";
    } elseif ($password !== $password_confirm) {
        $error = "Passwords do not match.";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters.";
    } else {
        $supabaseUrl    = rtrim(getenv('SUPABASE_URL'), '/');
        $supabaseAnonKey = getenv('SUPABASE_ANON_KEY');

        if (empty($supabaseUrl) || empty($supabaseAnonKey)) {
            $error = "Server configuration error. Please contact the administrator.";
        } else {
            $endpoint = $supabaseUrl . '/auth/v1/signup';
            $payload  = json_encode([
                'email'    => $email,
                'password' => $password,
                'data'     => ['username' => $username]
            ]);

            $ch = curl_init($endpoint);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_TIMEOUT, 15);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                "apikey: {$supabaseAnonKey}",
                "Content-Type: application/json"
            ]);

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $curlError = curl_error($ch);
            curl_close($ch);

            if ($curlError) {
                $error = "Connection error: " . $curlError;
            } else {
                $data = json_decode($response, true);

                if ($httpCode >= 200 && $httpCode < 300) {
                    $user_id           = $data['id'] ?? ($data['user']['id'] ?? null);
                    $registered_email  = $data['email'] ?? ($data['user']['email'] ?? $email);

                    if ($user_id && $registered_email) {
                        // Insert into our custom public.users table
                        require_once __DIR__ . '/../../services/DatabaseService.php';
                        try {
                            $db   = DatabaseService::getConnection();
                            $stmt = $db->prepare("INSERT INTO users (id, email, username, role) VALUES (?, ?, ?, 'user') ON CONFLICT (id) DO NOTHING");
                            $stmt->execute([$user_id, $registered_email, $username]);
                        } catch (Exception $e) {
                            // Ignore duplicate key errors if trigger is already active
                        }
                    }

                    $success = "Account created! Please check your email to confirm, then sign in.";
                } else {
                    // Parse Supabase error response
                    $errMsg = $data['error_description'] ?? ($data['msg'] ?? ($data['message'] ?? ''));
                    if (stripos($errMsg, 'already registered') !== false || stripos($errMsg, 'already exists') !== false) {
                        $error = "This email is already registered. Please sign in.";
                    } elseif (!empty($errMsg)) {
                        $error = $errMsg;
                    } else {
                        $error = "Registration failed (code: $httpCode). Please try again.";
                    }
                }
            }
        }
    }
}

require_once __DIR__ . '/../../layouts/header.php';
?>

<main class="pt-32 pb-24 px-8 min-h-[85vh] flex items-center justify-center bg-canvas">
    <div class="w-full max-w-md">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-semibold text-ink tracking-tight mb-2">Create an Account</h1>
            <p class="text-slate text-sm">Join the Space Shutter knowledge platform.</p>
        </div>
        
        <div class="bg-surface rounded-xl border border-hairline p-8 shadow-sm">
            <?php if ($error): ?>
                <div class="bg-brand-error/10 border border-brand-error text-brand-error text-sm p-4 rounded-lg mb-6">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div class="bg-green-500/10 border border-green-500 text-green-400 text-sm p-4 rounded-lg mb-6">
                    <?= htmlspecialchars($success) ?> <a href="/space-shuter/login" class="font-medium underline ml-1">Sign in</a>
                </div>
            <?php endif; ?>

            <form method="POST" action="/space-shuter/register" class="space-y-5">
                <div>
                    <label for="username" class="block text-sm font-medium text-ink mb-1.5">Username</label>
                    <input type="text" name="username" id="username" required placeholder="cool_astronaut_99" 
                           value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"
                           class="w-full bg-canvas border border-hairline rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-green focus:border-transparent transition-shadow">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-ink mb-1.5">Email address</label>
                    <input type="email" name="email" id="email" required placeholder="you@example.com" 
                           value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                           class="w-full bg-canvas border border-hairline rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-green focus:border-transparent transition-shadow">
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-medium text-ink mb-1.5">Password</label>
                    <input type="password" name="password" id="password" required placeholder="Min. 6 characters" 
                           class="w-full bg-canvas border border-hairline rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-green focus:border-transparent transition-shadow">
                </div>

                <div>
                    <label for="password_confirm" class="block text-sm font-medium text-ink mb-1.5">Confirm Password</label>
                    <input type="password" name="password_confirm" id="password_confirm" required placeholder="••••••••" 
                           class="w-full bg-canvas border border-hairline rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-green focus:border-transparent transition-shadow">
                </div>
                
                <button type="submit" class="w-full bg-primary text-on-primary font-medium text-sm py-2.5 rounded-lg hover:bg-charcoal transition-colors mt-2">
                    Sign up
                </button>
            </form>
            
            <div class="mt-6 text-center text-sm text-steel">
                Already have an account? <a href="/space-shuter/login" class="text-ink font-medium hover:underline">Sign in</a>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
