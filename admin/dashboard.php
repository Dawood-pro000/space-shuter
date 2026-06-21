<?php
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: ../login.php');
    exit;
}
require_once __DIR__ . '/../config/api.php';

// Fetch aggregate operational numbers via Supabase REST API
$articles = fetchSupabase('articles', 'select=id') ?? [];
$article_count = count($articles);

// Simulated tracking count for now until learning_tracks table is fully hydrated
$track_count = 0; 
?>
<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Space Shutter | Central Command Station</title>
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
    </style>
</head>
<body class="min-h-screen flex antialiased font-body-md text-base">

    <aside class="w-64 sidebar-blur flex flex-col justify-between p-6 fixed h-full z-40">
        <div class="space-y-10">
            <div class="font-headline-md text-xl tracking-widest text-primary-fixed uppercase flex items-center gap-2">
                <span class="material-symbols-outlined">satellite_alt</span> SHUTTER OS
            </div>
            <nav class="space-y-2">
                <a href="dashboard.php" class="flex items-center gap-3 px-4 py-3 bg-primary-fixed/10 text-primary-fixed border-l-4 border-primary-fixed font-label-caps text-xs tracking-widest uppercase transition">
                    <span class="material-symbols-outlined text-sm">dashboard</span> Command Hub
                </a>
                <a href="ai_assistant.php" class="flex items-center gap-3 px-4 py-3 text-outline hover:bg-surface-variant/30 hover:text-secondary-fixed font-label-caps text-xs tracking-widest uppercase transition">
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

    <main class="flex-grow p-10 max-w-7xl ml-64 relative z-10">
        <div class="fixed inset-0 pointer-events-none opacity-20 z-0 pl-64">
            <div class="w-full h-full border border-outline-variant/10 m-4"></div>
        </div>

        <header class="mb-12 relative z-10">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="font-headline-lg text-4xl font-extrabold tracking-tight uppercase text-white">Central Station</h1>
                    <p class="font-code-data text-xs text-secondary-fixed mt-2 tracking-[0.2em] uppercase">Platform architecture logging and operational data control center.</p>
                </div>
                <div class="font-code-data text-[10px] border border-error text-error px-3 py-1 uppercase tracking-widest">
                    KEY #3 SECURE LINK ACTIVE
                </div>
            </div>
        </header>

        <section class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12 relative z-10">
            <div class="glass-panel p-8 border-l-4 border-primary-fixed relative overflow-hidden group">
                <div class="absolute right-[-20px] top-[-20px] opacity-10 group-hover:opacity-20 transition-opacity">
                    <span class="material-symbols-outlined text-9xl text-primary-fixed">description</span>
                </div>
                <div class="font-code-data text-[10px] font-semibold uppercase tracking-[0.2em] text-outline mb-2">Ingested Articles (NASA)</div>
                <div class="font-headline-lg text-6xl text-primary-fixed"><?= $article_count ?></div>
            </div>
            <div class="glass-panel p-8 border-l-4 border-secondary-fixed relative overflow-hidden group">
                <div class="absolute right-[-20px] top-[-20px] opacity-10 group-hover:opacity-20 transition-opacity">
                    <span class="material-symbols-outlined text-9xl text-secondary-fixed">timeline</span>
                </div>
                <div class="font-code-data text-[10px] font-semibold uppercase tracking-[0.2em] text-outline mb-2">Active User Learning Tracks</div>
                <div class="font-headline-lg text-6xl text-secondary-fixed"><?= $track_count ?></div>
            </div>
        </section>

        <section class="glass-panel p-10 relative z-10 border-t border-outline-variant/50">
            <div class="flex items-center gap-3 mb-4">
                <span class="material-symbols-outlined text-error">build_circle</span>
                <h2 class="font-headline-md text-2xl font-bold uppercase text-white">System Maintenance</h2>
            </div>
            <p class="font-body-md text-sm text-on-surface-variant mb-8">Manually trigger background engines outside the scheduled 5-hour cron windows. This activates the dual-agent Gemini pipeline.</p>
            
            <div class="flex gap-4">
                <!-- Points to the cron script. When deployed, running this via web fetches new data -->
                <a href="../cron/fetch_nasa_data.php" target="_blank" class="px-8 py-4 bg-error/10 border border-error text-error hover:bg-error hover:text-[#0b0c10] font-label-caps font-bold tracking-widest text-sm uppercase transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">rocket_launch</span>
                    Execute T-002 Ingestion
                </a>
            </div>
        </section>
    </main>

</body>
</html>
