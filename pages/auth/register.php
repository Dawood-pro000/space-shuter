<?php
// pages/auth/register.php
$page_title = 'Create an Account | Space Shutter';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../../config/env_loader.php';
    
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';
    
    if (empty($email) || empty($password)) {
        $error = "Email and password are required.";
    } elseif ($password !== $password_confirm) {
        $error = "Passwords do not match.";
    } else {
        $supabaseUrl = rtrim(getenv('SUPABASE_URL'), '/');
        $supabaseAnonKey = getenv('SUPABASE_ANON_KEY');
        
        $endpoint = $supabaseUrl . '/auth/v1/signup';
        
        $payload = json_encode([
            'email' => $email,
            'password' => $password
        ]);
        
        $ch = curl_init($endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "apikey: {$supabaseAnonKey}",
            "Content-Type: application/json"
        ]);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        $data = json_decode($response, true);
        
        if ($httpCode >= 200 && $httpCode < 300) {
            $success = "Account created successfully! You can now sign in.";
            // Wait for user to trigger Supabase Email verification if enabled.
        } else {
            $error = $data['msg'] ?? 'Registration failed. Please try again.';
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
                <div class="bg-brand-green/10 border border-brand-green text-brand-green-deep text-sm p-4 rounded-lg mb-6">
                    <?= htmlspecialchars($success) ?> <a href="/space-shuter/login" class="font-medium underline ml-1">Sign in</a>
                </div>
            <?php endif; ?>

            <form method="POST" action="/space-shuter/register" class="space-y-5">
                <div>
                    <label for="email" class="block text-sm font-medium text-ink mb-1.5">Email address</label>
                    <input type="email" name="email" id="email" required placeholder="you@company.com" 
                           class="w-full bg-canvas border border-hairline rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-green focus:border-transparent transition-shadow">
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-medium text-ink mb-1.5">Password</label>
                    <input type="password" name="password" id="password" required placeholder="••••••••" 
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
