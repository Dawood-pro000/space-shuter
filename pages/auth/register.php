<?php
// pages/auth/register.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../../config/env_loader.php';

$page_title = 'Create Account | Space Shutter';
$error   = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email            = trim($_POST['email'] ?? '');
    $password         = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';
    $username         = trim($_POST['username'] ?? '');

    if (empty($email) || empty($password)) {
        $error = "Email and password are required.";
    } elseif ($password !== $password_confirm) {
        $error = "Passwords do not match.";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters.";
    } else {
        $supabaseUrl     = rtrim($_ENV['SUPABASE_URL'] ?? getenv('SUPABASE_URL') ?? '', '/');
        $supabaseAnonKey = $_ENV['SUPABASE_ANON_KEY'] ?? getenv('SUPABASE_ANON_KEY') ?? '';

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

            $response  = curl_exec($ch);
            $httpCode  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $curlError = curl_error($ch);
            curl_close($ch);

            if ($curlError) {
                $error = "Connection error: " . $curlError;
            } else {
                $data = json_decode($response, true);

                if ($httpCode >= 200 && $httpCode < 300) {
                    $user_id          = $data['id'] ?? ($data['user']['id'] ?? null);
                    $registered_email = $data['email'] ?? ($data['user']['email'] ?? $email);

                    if ($user_id && $registered_email) {
                        require_once __DIR__ . '/../../services/DatabaseService.php';
                        try {
                            $db   = DatabaseService::getConnection();
                            $stmt = $db->prepare("INSERT INTO users (id, email, username, role) VALUES (?, ?, ?, 'user') ON CONFLICT (id) DO NOTHING");
                            $stmt->execute([$user_id, $registered_email, $username]);
                        } catch (Exception $e) {
                            // Ignore duplicate
                        }
                    }
                    $success = "Mission initiated! Check your email to confirm your account, then sign in.";
                } else {
                    $errMsg = $data['error_description'] ?? ($data['msg'] ?? ($data['message'] ?? ''));
                    if (stripos($errMsg, 'already registered') !== false || stripos($errMsg, 'already exists') !== false) {
                        $error = "This email is already registered. <a href='/space-shuter/login' class='underline font-medium'>Sign in instead</a>.";
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title><?= $page_title ?></title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet"/>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-purple': '#7e22ce',
                        'brand-gold': '#fbbf24',
                        'brand-error': '#ef4444',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Cinzel', 'serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body { background: #000; }
        #stars-canvas { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; pointer-events: none; }
        .auth-card { background: rgba(17,17,22,0.85); backdrop-filter: blur(20px); border: 1px solid rgba(126,34,206,0.3); }
        .glow-input:focus { box-shadow: 0 0 0 2px rgba(126,34,206,0.5); border-color: #7e22ce; }
        .btn-primary {
            background: linear-gradient(135deg, #7e22ce, #4c1d95);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #9333ea, #6d28d9);
            box-shadow: 0 0 20px rgba(126,34,206,0.6);
            transform: translateY(-1px);
        }
        .orbit-ring { animation: spin 8s linear infinite; }
        @keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
    </style>
</head>
<body class="min-h-screen font-sans text-white overflow-x-hidden">

<!-- Animated Starfield -->
<canvas id="stars-canvas"></canvas>

<!-- Nebula glow -->
<div class="fixed inset-0 z-0 pointer-events-none">
    <div class="absolute top-1/4 right-1/4 w-96 h-96 rounded-full bg-purple-900/20 blur-[120px]"></div>
    <div class="absolute bottom-1/4 left-1/4 w-80 h-80 rounded-full bg-indigo-900/20 blur-[100px]"></div>
</div>

<main class="relative z-10 min-h-screen flex items-center justify-center px-4 py-20">
    <div class="w-full max-w-md">

        <!-- Logo -->
        <div class="text-center mb-8">
            <a href="/space-shuter/" class="inline-flex flex-col items-center gap-3">
                <div class="relative w-16 h-16 mb-2">
                    <div class="w-16 h-16 rounded-full bg-gradient-to-br from-purple-600 to-indigo-900 shadow-[0_0_30px_rgba(126,34,206,0.6)]"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-20 h-4 border-2 border-brand-gold/60 rounded-full orbit-ring"></div>
                    </div>
                    <div class="absolute inset-2 rounded-full bg-gradient-to-tr from-purple-500/30 to-white/10"></div>
                </div>
                <span class="font-serif text-2xl tracking-widest text-white">SPACE SHUTTER</span>
                <span class="text-slate-400 text-xs tracking-wider">BEYOND EARTH, INTO INFINITY</span>
            </a>
        </div>

        <div class="auth-card rounded-2xl p-8 shadow-[0_0_60px_rgba(126,34,206,0.2)]">
            <h1 class="text-2xl font-serif font-semibold text-white text-center mb-2">Join the Mission</h1>
            <p class="text-slate-400 text-sm text-center mb-8">Create your Space Shutter account</p>

            <?php if ($error): ?>
                <div class="bg-red-500/10 border border-red-500/50 text-red-400 text-sm p-4 rounded-xl mb-6 flex items-start gap-3">
                    <svg class="w-5 h-5 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span><?= $error ?></span>
                </div>
            <?php endif; ?>

            <?php if ($success): ?>
                <div class="bg-green-500/10 border border-green-500/50 text-green-400 text-sm p-4 rounded-xl mb-6 flex items-start gap-3">
                    <svg class="w-5 h-5 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span><?= htmlspecialchars($success) ?> <a href="/space-shuter/login" class="font-semibold underline ml-1">Sign in now →</a></span>
                </div>
            <?php endif; ?>

            <?php if (!$success): ?>
            <form method="POST" action="/space-shuter/register" class="space-y-4">
                <div>
                    <label for="username" class="block text-sm font-medium text-slate-300 mb-2">Username</label>
                    <input type="text" name="username" id="username" required placeholder="cool_astronaut_99"
                           value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"
                           class="glow-input w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-500 outline-none transition-all">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-slate-300 mb-2">Email Address</label>
                    <input type="email" name="email" id="email" required placeholder="you@example.com"
                           value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                           class="glow-input w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-500 outline-none transition-all">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-slate-300 mb-2">Password <span class="text-slate-500 text-xs">(min. 6 characters)</span></label>
                    <input type="password" name="password" id="password" required placeholder="••••••••"
                           class="glow-input w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-500 outline-none transition-all">
                </div>

                <div>
                    <label for="password_confirm" class="block text-sm font-medium text-slate-300 mb-2">Confirm Password</label>
                    <input type="password" name="password_confirm" id="password_confirm" required placeholder="••••••••"
                           class="glow-input w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-500 outline-none transition-all">
                </div>

                <button type="submit" class="btn-primary w-full text-white font-semibold text-sm py-3 rounded-xl mt-2">
                    Launch My Account 🚀
                </button>
            </form>
            <?php endif; ?>

            <div class="mt-6 text-center text-sm text-slate-500">
                Already have an account?
                <a href="/space-shuter/login" class="text-purple-400 font-medium hover:text-purple-300 transition-colors ml-1">Sign In</a>
            </div>
        </div>

        <div class="text-center mt-6">
            <a href="/space-shuter/" class="text-slate-500 text-xs hover:text-slate-300 transition-colors flex items-center justify-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Back to Homepage
            </a>
        </div>
    </div>
</main>

<script>
const canvas = document.getElementById('stars-canvas');
const ctx = canvas.getContext('2d');
let stars = [];

function resize() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
}

function initStars() {
    stars = [];
    for (let i = 0; i < 200; i++) {
        stars.push({
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height,
            r: Math.random() * 1.5 + 0.2,
            alpha: Math.random(),
            speed: Math.random() * 0.003 + 0.001
        });
    }
}

function drawStars() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    stars.forEach(s => {
        s.alpha += s.speed;
        if (s.alpha > 1 || s.alpha < 0) s.speed *= -1;
        ctx.save();
        ctx.globalAlpha = s.alpha;
        ctx.fillStyle = '#ffffff';
        ctx.beginPath();
        ctx.arc(s.x, s.y, s.r, 0, Math.PI * 2);
        ctx.fill();
        ctx.restore();
    });
    requestAnimationFrame(drawStars);
}

resize();
initStars();
drawStars();
window.addEventListener('resize', () => { resize(); initStars(); });
</script>
</body>
</html>
