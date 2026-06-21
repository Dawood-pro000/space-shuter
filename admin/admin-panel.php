<?php
require_once __DIR__ . '/config/api.php';

// Fetch recent articles from Supabase to show in the dashboard
$articles = fetchSupabase('articles', 'select=id,title,category,created_at&order=created_at.desc&limit=10') ?? [];

// In a real scenario, you would have admin authentication here.
?>
<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Admin Command Center | Project Vision</title>
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
        .laser-glow {
            box-shadow: 0 0 15px rgba(102, 252, 241, 0.2);
            transition: all 0.3s ease;
        }
        .laser-glow:hover {
            box-shadow: 0 0 25px rgba(102, 252, 241, 0.6);
        }
        body {
            background-color: #0b0c10;
            color: #e2e2e3;
        }
    </style>
</head>
<body class="antialiased font-body-md text-base overflow-x-hidden">
    <div class="fixed inset-0 pointer-events-none opacity-20 z-0">
        <div class="absolute top-8 left-8 font-code-data text-sm text-primary-fixed">COORD: 00.00.00 // ADMIN_ROOT</div>
        <div class="w-full h-full border border-outline-variant/10 m-4"></div>
    </div>

    <header class="flex justify-between items-center w-full px-8 h-16 z-50 bg-[#0c0f0f]/80 backdrop-blur-xl border-b border-outline-variant/30 fixed top-0 left-0">
        <a href="/core-discovery.php" class="font-headline-md text-xl text-error tracking-widest uppercase hover:text-white transition-colors">Vision // Admin</a>
        <nav class="hidden md:flex items-center gap-8">
            <a class="text-on-surface-variant hover:text-primary-fixed transition-colors font-body-md" href="/core-discovery.php">Hub</a>
            <a class="text-error font-bold border-b-2 border-error pb-1 font-body-md" href="#">Command Center</a>
        </nav>
        <div class="flex items-center gap-6">
            <span class="font-code-data text-xs text-error border border-error px-2 py-1">KEY #3 ACTIVE</span>
            <span class="material-symbols-outlined text-error cursor-pointer">admin_panel_settings</span>
        </div>
    </header>

    <main class="pt-24 min-h-screen relative z-10 max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 pb-12">
        <div class="mb-10">
            <h1 class="font-headline-lg text-4xl text-white uppercase tracking-wider">System Diagnostics</h1>
            <p class="font-code-data text-on-surface-variant mt-2 tracking-widest">OVERSEEING PIPELINE AND DATABASE INGESTION</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <!-- Data Fetch Trigger -->
            <div class="glass-panel p-6 border-l-4 border-error">
                <div class="flex items-center gap-3 mb-4">
                    <span class="material-symbols-outlined text-error">rocket_launch</span>
                    <h2 class="font-headline-md text-xl text-white uppercase">Manual Override</h2>
                </div>
                <p class="font-body-md text-sm text-on-surface-variant mb-6">Trigger the dual-agent Gemini pipeline to fetch new data from NASA immediately.</p>
                <button onclick="triggerFetch()" id="fetch-btn" class="w-full py-3 bg-error/20 text-error border border-error hover:bg-error hover:text-[#0b0c10] font-label-caps font-bold tracking-widest uppercase transition-all flex justify-center items-center gap-2">
                    <span class="material-symbols-outlined text-sm">sync</span>
                    Initiate Ingestion
                </button>
                <div id="fetch-status" class="mt-4 font-code-data text-xs hidden"></div>
            </div>

            <!-- Database Stats -->
            <div class="glass-panel p-6 border-l-4 border-primary-fixed">
                <div class="flex items-center gap-3 mb-4">
                    <span class="material-symbols-outlined text-primary-fixed">database</span>
                    <h2 class="font-headline-md text-xl text-white uppercase">Storage Logs</h2>
                </div>
                <div class="space-y-4">
                    <div>
                        <div class="font-code-data text-xs text-outline uppercase">Total Articles</div>
                        <div class="font-label-caps text-3xl text-primary-fixed"><?= count($articles) ?> <span class="text-sm text-on-surface-variant">+</span></div>
                    </div>
                    <div>
                        <div class="font-code-data text-xs text-outline uppercase">Last Sync</div>
                        <div class="font-label-caps text-md text-secondary-fixed">
                            <?= !empty($articles) ? date('Y-m-d H:i:s', strtotime($articles[0]['created_at'])) : 'UNKNOWN' ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Agent Status -->
            <div class="glass-panel p-6 border-l-4 border-secondary-fixed">
                <div class="flex items-center gap-3 mb-4">
                    <span class="material-symbols-outlined text-secondary-fixed">memory</span>
                    <h2 class="font-headline-md text-xl text-white uppercase">Agent Health</h2>
                </div>
                <ul class="space-y-3 font-code-data text-sm">
                    <li class="flex justify-between items-center">
                        <span class="text-outline">Key #1 (Ingestion)</span>
                        <span class="text-primary-fixed">ONLINE</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <span class="text-outline">Key #2 (Creative)</span>
                        <span class="text-primary-fixed">ONLINE</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <span class="text-outline">Key #3 (Admin)</span>
                        <span class="text-error">ACTIVE</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="glass-panel p-8 relative overflow-hidden">
            <h2 class="font-headline-md text-2xl text-white uppercase tracking-wider mb-6">Recent Records</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-outline-variant/50">
                            <th class="py-4 px-4 font-label-caps text-outline uppercase tracking-wider text-xs">ID</th>
                            <th class="py-4 px-4 font-label-caps text-outline uppercase tracking-wider text-xs">Title</th>
                            <th class="py-4 px-4 font-label-caps text-outline uppercase tracking-wider text-xs">Category</th>
                            <th class="py-4 px-4 font-label-caps text-outline uppercase tracking-wider text-xs">Ingested On</th>
                            <th class="py-4 px-4 font-label-caps text-outline uppercase tracking-wider text-xs">Action</th>
                        </tr>
                    </thead>
                    <tbody class="font-code-data text-sm text-on-surface-variant">
                        <?php if (empty($articles)): ?>
                        <tr>
                            <td colspan="5" class="py-8 text-center text-outline">No records found in deep storage.</td>
                        </tr>
                        <?php else: ?>
                            <?php foreach ($articles as $art): ?>
                            <tr class="border-b border-outline-variant/20 hover:bg-surface-variant/20 transition-colors">
                                <td class="py-4 px-4 text-secondary-fixed">#<?= substr($art['id'], 0, 8) ?></td>
                                <td class="py-4 px-4 text-white"><?= htmlspecialchars($art['title']) ?></td>
                                <td class="py-4 px-4 uppercase tracking-widest text-xs"><?= htmlspecialchars($art['category']) ?></td>
                                <td class="py-4 px-4"><?= date('M d, Y', strtotime($art['created_at'])) ?></td>
                                <td class="py-4 px-4">
                                    <button class="text-error hover:text-white transition-colors">DELETE</button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        function triggerFetch() {
            const btn = document.getElementById('fetch-btn');
            const status = document.getElementById('fetch-status');
            
            btn.disabled = true;
            btn.classList.add('opacity-50');
            btn.innerHTML = '<span class="material-symbols-outlined animate-spin text-sm">sync</span> EXECUTING PIPELINE...';
            status.classList.remove('hidden');
            status.className = "mt-4 font-code-data text-xs text-secondary-fixed animate-pulse";
            status.innerText = ">> Establishing link with NASA mainframes...";

            // Send a request to our cron job script (which is actually web-accessible in our setup for testing)
            fetch('/cron/fetch_nasa_data.php')
                .then(response => response.text())
                .then(data => {
                    btn.disabled = false;
                    btn.classList.remove('opacity-50');
                    btn.innerHTML = '<span class="material-symbols-outlined text-sm">check</span> PIPELINE COMPLETE';
                    
                    status.className = "mt-4 font-code-data text-xs text-primary-fixed";
                    status.innerText = ">> Data ingestion successful. Reloading...";
                    
                    setTimeout(() => location.reload(), 2000);
                })
                .catch(err => {
                    btn.disabled = false;
                    btn.classList.remove('opacity-50');
                    btn.innerHTML = '<span class="material-symbols-outlined text-sm">sync</span> RETRY INGESTION';
                    
                    status.className = "mt-4 font-code-data text-xs text-error";
                    status.innerText = ">> Critical Error: Pipeline failed.";
                });
        }
    </script>
</body>
</html>