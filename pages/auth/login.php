<?php
// pages/auth/login.php
$page_title = 'Sign In | Space Shutter';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../../config/env_loader.php';
    
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (empty($email) || empty($password)) {
        $error = "Email and password are required.";
    } else {
        $supabaseUrl = rtrim(getenv('SUPABASE_URL'), '/');
        $supabaseAnonKey = getenv('SUPABASE_ANON_KEY');
        
        $endpoint = $supabaseUrl . '/auth/v1/token?grant_type=password';
        
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
            // Success
            $_SESSION['user_id'] = $data['user']['id'];
            $_SESSION['access_token'] = $data['access_token'];
            $_SESSION['refresh_token'] = $data['refresh_token'];
            
            // Check Role and Username from our custom public.users table
            require_once __DIR__ . '/../../services/DatabaseService.php';
            $db = DatabaseService::getConnection();
            $stmt = $db->prepare("SELECT role, username FROM users WHERE id = ?");
            $stmt->execute([$data['user']['id']]);
            $user_data = $stmt->fetch();
            
            if ($user_data) {
                $_SESSION['user_role'] = $user_data['role'];
                $_SESSION['username'] = $user_data['username'];
            } else {
                // If user doesn't exist in our table yet (e.g., fresh signup without trigger), insert them
                $stmt = $db->prepare("INSERT INTO users (id, email, username, role) VALUES (?, ?, '', 'user')");
                $stmt->execute([$data['user']['id'], $data['user']['email']]);
                $_SESSION['user_role'] = 'user';
                $_SESSION['username'] = '';
            }
            
            if ($_SESSION['user_role'] === 'admin') {
                header('Location: /space-shuter/admin');
            } else {
                header('Location: /space-shuter/feed');
            }
            exit;
        } else {
            $error = $data['error_description'] ?? 'Invalid email or password.';
        }
    }
}

require_once __DIR__ . '/../../layouts/header.php';
?>

<main class="pt-32 pb-24 px-8 min-h-[85vh] flex items-center justify-center bg-canvas">
    <div class="w-full max-w-md">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-semibold text-ink tracking-tight mb-2">Welcome back</h1>
            <p class="text-slate text-sm">Sign in to your Space Shutter account.</p>
        </div>
        
        <div class="bg-surface rounded-xl border border-hairline p-8 shadow-sm">
            <?php if ($error): ?>
                <div class="bg-brand-error/10 border border-brand-error text-brand-error text-sm p-4 rounded-lg mb-6">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="/space-shuter/login" class="space-y-5">
                <div>
                    <label for="email" class="block text-sm font-medium text-ink mb-1.5">Email address</label>
                    <input type="email" name="email" id="email" required placeholder="you@company.com" 
                           class="w-full bg-canvas border border-hairline rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-green focus:border-transparent transition-shadow">
                </div>
                
                <div>
                    <div class="flex justify-between items-center mb-1.5">
                        <label for="password" class="block text-sm font-medium text-ink">Password</label>
                        <a href="/space-shuter/reset-password" class="text-xs text-steel hover:text-ink transition-colors font-medium">Forgot password?</a>
                    </div>
                    <input type="password" name="password" id="password" required placeholder="••••••••" 
                           class="w-full bg-canvas border border-hairline rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-green focus:border-transparent transition-shadow">
                </div>
                
                <button type="submit" class="w-full bg-primary text-on-primary font-medium text-sm py-2.5 rounded-lg hover:bg-charcoal transition-colors mt-2">
                    Sign in
                </button>
            </form>
            
            <div class="mt-6 text-center text-sm text-steel">
                Don't have an account? <a href="/space-shuter/register" class="text-ink font-medium hover:underline">Sign up</a>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
