<?php
require_once __DIR__ . '/config/api.php';

// Secure login routine handler wrapper
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    // Direct Check for Admin bypass rule
    if ($email === 'admin@spaceshutter.com' && $password === 'your-secure-admin-pass') {
        session_start();
        $_SESSION['user_role'] = 'admin';
        $_SESSION['user_id'] = 'admin-master';
        header('Location: admin/dashboard.php');
        exit;
    } else {
        // Handle normal users validation against Supabase Auth here...
        $error = "Invalid credential authentication signature. Access Denied.";
    }
}
?>
<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Space Shutter | Secure Handshake Portal</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;800&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary-fixed": "#62f9ee",
                        "secondary-fixed": "#98f2ed",
                        "outline": "#859491",
                        "outline-variant": "#3c4948",
                        "error": "#ffb4ab",
                        "surface-container-lowest": "#0c0f0f",
                        "surface-container-low": "#1a1c1d",
                        "surface-variant": "#333536",
                        "on-surface-variant": "#bacac7"
                    },
                    fontFamily: {
                        "body-md": ["Space Grotesk"],
                        "headline-lg": ["Orbitron"],
                        "code-data": ["Space Grotesk"],
                        "label-caps": ["Space Grotesk"],
                        "headline-md": ["Orbitron"]
                    }
                }
            }
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            line-height: 1;
        }
        .glass-panel {
            background: rgba(31, 40, 51, 0.4);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(60, 73, 72, 0.3);
        }
        body {
            background-color: #0b0c10;
            color: #e2e2e3;
        }
        .laser-glow {
            box-shadow: 0 0 15px rgba(98, 249, 238, 0.2);
            transition: all 0.3s ease;
        }
        .laser-glow:hover {
            box-shadow: 0 0 25px rgba(98, 249, 238, 0.6);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-6 relative overflow-hidden font-body-md">

    <div class="fixed inset-0 pointer-events-none opacity-20 z-0">
        <div class="absolute top-8 left-8 font-code-data text-sm text-error">SECURITY: LEVEL-5_REQUIRED</div>
        <div class="w-full h-full border border-error/10 m-4"></div>
    </div>

    <div class="glass-panel w-full max-w-md p-10 relative z-10 border-t-4 border-primary-fixed shadow-[0_0_30px_rgba(98,249,238,0.1)]">
        <div class="text-center mb-10">
            <a href="index.php" class="font-headline-md text-2xl tracking-widest text-primary-fixed uppercase flex items-center justify-center gap-2">
                <span class="material-symbols-outlined">rocket_launch</span> SPACE SHUTTER
            </a>
            <h2 class="font-headline-lg text-2xl mt-6 text-white uppercase tracking-wider">System Authentication</h2>
            <p class="font-code-data text-xs text-outline mt-2 tracking-widest uppercase">Provide authorization tokens to open terminal</p>
        </div>

        <?php if(isset($error)): ?>
            <div class="bg-error/10 border border-error text-error font-code-data text-xs p-4 mb-8 text-center flex items-center justify-center gap-2 uppercase tracking-widest">
                <span class="material-symbols-outlined text-sm">warning</span>
                <?= $error ?>
            </div>
        <?php endif; ?>

        <form action="login.php" method="POST" class="space-y-6">
            <div>
                <label class="block font-code-data text-[10px] uppercase tracking-[0.2em] text-secondary-fixed mb-2">Comms Identity (Email)</label>
                <input type="email" name="email" required class="w-full bg-[#0b0c10] border border-outline-variant/50 focus:border-primary-fixed focus:ring-1 focus:ring-primary-fixed text-white font-body-md px-4 py-3 outline-none transition-all" placeholder="ID.TAG@DOMAIN">
            </div>
            <div>
                <label class="block font-code-data text-[10px] uppercase tracking-[0.2em] text-secondary-fixed mb-2">Security Hash Key (Password)</label>
                <input type="password" name="password" required class="w-full bg-[#0b0c10] border border-outline-variant/50 focus:border-primary-fixed focus:ring-1 focus:ring-primary-fixed text-white font-body-md px-4 py-3 outline-none transition-all" placeholder="••••••••">
            </div>
            <button type="submit" class="w-full py-4 bg-primary-fixed/10 text-primary-fixed border border-primary-fixed hover:bg-primary-fixed hover:text-[#0b0c10] font-label-caps font-bold tracking-widest uppercase transition-all flex justify-center items-center gap-2 laser-glow mt-4">
                <span class="material-symbols-outlined text-sm">lock_open</span>
                Establish Connection
            </button>
        </form>
    </div>

</body>
</html>