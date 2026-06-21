<?php
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: ../auth/login.php');
    exit;
}
require_once __DIR__ . '/../api/api.php';

// Fetch aggregate operational numbers via Supabase 
$total_articles = count(fetchSupabase('articles', 'select=id') ?? []);
$recent_logs = fetchSupabase('articles', 'select=id,title,created_at&order=created_at.desc&limit=5') ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Admin Dashboard | Project Vision</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Geist+Mono:wght@400;500&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#0a0a0a",
                        "on-primary": "#ffffff",
                        "brand-green": "#00d4a4",
                        canvas: "#ffffff",
                        surface: "#f7f7f7",
                        "surface-soft": "#fafafa",
                        hairline: "#e5e5e5",
                        ink: "#0a0a0a",
                        slate: "#3a3a3c",
                        steel: "#5a5a5c",
                    },
                    fontFamily: {
                        sans: ["Inter", "sans-serif"],
                        mono: ["Geist Mono", "monospace"],
                    },
                    borderRadius: { md: "8px", lg: "12px", full: "9999px" }
                }
            }
        }
    </script>
</head>
<body class="antialiased selection:bg-brand-green selection:text-primary min-h-screen flex bg-surface-soft">

    <!-- Sidebar -->
    <aside class="w-[240px] fixed left-0 top-0 bottom-0 bg-canvas border-r border-hairline p-4 flex flex-col justify-between">
        <div class="space-y-6 mt-4">
            <div class="px-3">
                <span class="font-semibold tracking-tight text-lg text-ink">Project Vision</span>
            </div>
            
            <nav class="space-y-1">
                <a href="dashboard.php" class="block px-3 py-1.5 rounded-sm text-sm font-medium bg-surface text-ink">Overview</a>
                <a href="ai_assistant.php" class="block px-3 py-1.5 rounded-sm text-sm text-steel hover:text-ink transition-colors">Co-Pilot AI</a>
                <a href="../user/core-discovery.php" class="block px-3 py-1.5 rounded-sm text-sm text-steel hover:text-ink transition-colors">Documentation</a>
            </nav>
        </div>
        
        <div class="px-3 mb-4">
            <a href="../auth/logout.php" class="text-[13px] font-medium text-steel hover:text-[#d45656] transition-colors">Sign out</a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 ml-[240px] p-10 max-w-5xl">
        <header class="mb-10">
            <h1 class="text-[36px] font-semibold text-ink leading-[1.2] tracking-[-0.5px] mb-2">Admin Dashboard</h1>
            <p class="text-[16px] text-slate font-normal">Manage ingestion pipelines and view system analytics.</p>
        </header>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-canvas p-6 rounded-lg border border-hairline shadow-[rgba(0,0,0,0.02)_0px_4px_12px_0px]">
                <div class="text-[13px] font-medium text-steel mb-2 uppercase tracking-[0.5px]">Total Articles</div>
                <div class="text-[36px] font-semibold text-ink"><?= $total_articles ?></div>
            </div>
            
            <div class="bg-canvas p-6 rounded-lg border border-hairline shadow-[rgba(0,0,0,0.02)_0px_4px_12px_0px]">
                <div class="text-[13px] font-medium text-steel mb-2 uppercase tracking-[0.5px]">API Status</div>
                <div class="flex items-center gap-2 mt-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-brand-green"></span>
                    <span class="text-[16px] font-semibold text-ink">Operational</span>
                </div>
            </div>

            <div class="bg-canvas p-6 rounded-lg border border-hairline shadow-[rgba(0,0,0,0.02)_0px_4px_12px_0px] flex flex-col justify-center">
                <button onclick="triggerCron()" id="cronBtn" class="w-full bg-primary text-on-primary text-[14px] font-medium rounded-full py-[10px] hover:bg-[#1c1c1e] transition-colors">
                    Trigger Manual Ingestion
                </button>
            </div>
        </div>

        <!-- Recent Logs Table -->
        <div class="bg-canvas rounded-lg border border-hairline overflow-hidden">
            <div class="px-6 py-4 border-b border-hairline bg-surface flex justify-between items-center">
                <h3 class="text-[14px] font-medium text-ink">Recent Ingestion Logs</h3>
            </div>
            <div class="divide-y divide-hairline">
                <?php if (empty($recent_logs)): ?>
                    <div class="p-6 text-center text-sm text-steel">No logs found in the database.</div>
                <?php else: ?>
                    <?php foreach ($recent_logs as $log): ?>
                    <div class="p-4 px-6 flex justify-between items-center">
                        <div>
                            <div class="text-[14px] font-medium text-ink"><?= htmlspecialchars($log['title']) ?></div>
                            <div class="text-[13px] text-steel font-mono mt-1">ID: <?= htmlspecialchars($log['id']) ?></div>
                        </div>
                        <div class="text-[13px] text-steel font-mono">
                            <?= date('M j, Y H:i:s', strtotime($log['created_at'])) ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <script>
        function triggerCron() {
            const btn = document.getElementById('cronBtn');
            btn.innerText = 'Executing...';
            btn.disabled = true;
            btn.classList.add('opacity-50');

            fetch('../cron/fetch_nasa_data.php')
                .then(res => res.text())
                .then(data => {
                    alert('Ingestion Complete. Check logs.');
                    window.location.reload();
                })
                .catch(err => {
                    alert('Ingestion Failed.');
                    btn.innerText = 'Trigger Manual Ingestion';
                    btn.disabled = false;
                    btn.classList.remove('opacity-50');
                });
        }
    </script>
</body>
</html>
