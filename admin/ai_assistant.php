<?php
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: ../login.php');
    exit;
}
?>
<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Space Shutter | Admin Co-Pilot Terminal</title>
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
        body { background-color: #0b0c10; color: #e2e2e3; }
        .sidebar-blur { background: rgba(12, 15, 15, 0.8); backdrop-filter: blur(20px); border-right: 1px solid rgba(60, 73, 72, 0.3); }
        .terminal-box { background: #07090b; border: 1px solid #3c4948; box-shadow: inset 0 0 20px rgba(0,0,0,0.8); }
        .laser-glow { box-shadow: 0 0 15px rgba(98, 249, 238, 0.2); transition: all 0.3s ease; }
        .laser-glow:hover { box-shadow: 0 0 25px rgba(98, 249, 238, 0.6); }
    </style>
</head>
<body class="min-h-screen flex antialiased font-body-md text-base">

    <aside class="w-64 sidebar-blur flex flex-col justify-between p-6 fixed h-full z-40">
        <div class="space-y-10">
            <div class="font-headline-md text-xl tracking-widest text-primary-fixed uppercase flex items-center gap-2">
                <span class="material-symbols-outlined">satellite_alt</span> SHUTTER OS
            </div>
            <nav class="space-y-2">
                <a href="dashboard.php" class="flex items-center gap-3 px-4 py-3 text-outline hover:bg-surface-variant/30 hover:text-white font-label-caps text-xs tracking-widest uppercase transition">
                    <span class="material-symbols-outlined text-sm">dashboard</span> Command Hub
                </a>
                <a href="ai_assistant.php" class="flex items-center gap-3 px-4 py-3 bg-secondary-fixed/10 text-secondary-fixed border-l-4 border-secondary-fixed font-label-caps text-xs tracking-widest uppercase transition">
                    <span class="material-symbols-outlined text-sm">psychology</span> Co-Pilot AI
                </a>
                <a href="../core-discovery.php" class="flex items-center gap-3 px-4 py-3 text-outline hover:bg-surface-variant/30 hover:text-white font-label-caps text-xs tracking-widest uppercase transition">
                    <span class="material-symbols-outlined text-sm">public</span> Public Archive
                </a>
            </nav>
        </div>
        <div>
            <a href="../logout.php" class="flex items-center gap-2 text-[10px] font-code-data uppercase tracking-widest text-error hover:underline opacity-80 hover:opacity-100">
                <span class="material-symbols-outlined text-xs">power_settings_new</span> Terminate Session
            </a>
        </div>
    </aside>

    <main class="flex-grow p-10 flex flex-col justify-between max-w-6xl ml-64 relative z-10">
        <div class="fixed inset-0 pointer-events-none opacity-20 z-0 pl-64">
            <div class="w-full h-full border border-outline-variant/10 m-4"></div>
        </div>

        <header class="mb-6 relative z-10">
            <h1 class="font-headline-lg text-4xl font-extrabold tracking-tight uppercase text-white flex items-center gap-3">
                <span class="material-symbols-outlined text-secondary-fixed text-4xl">memory</span> Key #3 Co-Pilot
            </h1>
            <p class="font-code-data text-xs text-outline mt-2 tracking-[0.2em] uppercase">Isolated administrative assistant context loop for runtime monitoring support.</p>
        </header>

        <div class="flex-grow terminal-box relative z-10 p-8 mb-6 overflow-y-auto space-y-6 min-h-[400px]">
            <!-- Terminal Header -->
            <div class="font-code-data text-[10px] text-secondary-fixed uppercase tracking-widest border-b border-outline-variant/30 pb-2 mb-6">
                SECURE TERMINAL INSTANCE // ID: ADMIN-MASTER // ENCRYPTION: AES-256
            </div>

            <!-- Co-Pilot Message -->
            <div class="flex flex-col space-y-2">
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 bg-secondary-fixed rounded-full animate-pulse"></span>
                    <span class="font-code-data text-[10px] text-secondary-fixed font-bold uppercase tracking-widest">System Engine [Key #3]</span>
                </div>
                <div class="font-body-md text-sm text-on-surface-variant max-w-3xl glass-panel p-5 border-l-2 border-secondary-fixed">
                    Terminal baseline connection stable. I am synchronized with your Railway environmental settings matrix and Supabase core. What architectural adjustment or debugging task do we need to inspect?
                </div>
            </div>
        </div>

        <div class="w-full flex gap-4 relative z-10">
            <div class="flex-grow relative">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 font-code-data text-secondary-fixed font-bold">></span>
                <input type="text" placeholder="Query system diagnostics, schema adjustments, or token rotation hooks..." class="w-full bg-[#0b0c10] border border-outline-variant/50 focus:border-secondary-fixed focus:ring-1 focus:ring-secondary-fixed text-white font-code-data px-10 py-4 outline-none transition-all placeholder:text-outline/50">
            </div>
            <button class="px-8 py-4 bg-secondary-fixed/10 border border-secondary-fixed text-secondary-fixed hover:bg-secondary-fixed hover:text-[#0b0c10] font-label-caps font-bold tracking-widest uppercase transition-colors laser-glow flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">send</span>
                Transmit
            </button>
        </div>
    </main>

</body>
</html>
