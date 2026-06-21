<?php
require_once __DIR__ . '/../api/api.php';
$articles = fetchSupabase('articles', 'select=id,title,slug,image_url,raw_abstract,created_at&order=created_at.desc&limit=10') ?? [];
$heroArticle = !empty($articles) ? $articles[0] : null;
$otherArticles = array_slice($articles, 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Documentation | Project Vision</title>
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
                        "brand-green-deep": "#00b48a",
                        "brand-tag": "#3772cf",
                        canvas: "#ffffff",
                        "canvas-dark": "#0a0a0a",
                        surface: "#f7f7f7",
                        "surface-soft": "#fafafa",
                        "surface-code": "#1c1c1e",
                        hairline: "#e5e5e5",
                        "hairline-soft": "#ededed",
                        ink: "#0a0a0a",
                        charcoal: "#1c1c1e",
                        slate: "#3a3a3c",
                        steel: "#5a5a5c",
                        stone: "#888888",
                        muted: "#a8a8aa",
                    },
                    fontFamily: {
                        sans: ["Inter", "sans-serif"],
                        mono: ["Geist Mono", "monospace"],
                    },
                    borderRadius: {
                        sm: "6px",
                        md: "8px",
                        lg: "12px",
                        full: "9999px"
                    }
                }
            }
        }
    </script>
    <style>
        body { background-color: #ffffff; color: #0a0a0a; font-family: 'Inter', sans-serif; }
        .sidebar-nav-item.active { background-color: #f7f7f7; color: #0a0a0a; font-weight: 500; }
        .sidebar-nav-item { color: #5a5a5c; }
        .sidebar-nav-item:hover { color: #0a0a0a; }
        
        /* Hide scrollbar */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="antialiased selection:bg-brand-green selection:text-primary min-h-screen flex flex-col">

    <!-- Top Navigation (Documentation) -->
    <nav class="fixed top-0 w-full bg-canvas/90 backdrop-blur-md border-b border-hairline z-50 h-[56px] flex items-center px-6 justify-between">
        <div class="flex items-center gap-6">
            <a href="../index.php" class="font-semibold tracking-tight text-lg text-ink">Project Vision</a>
            
            <!-- Search Pill -->
            <div class="hidden md:flex items-center bg-surface border border-hairline rounded-md h-[36px] px-3 w-64 text-sm text-steel cursor-pointer hover:bg-hairline-soft transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <span>Search documentation...</span>
            </div>
        </div>
        
        <div class="hidden md:flex items-center gap-6 text-sm font-medium text-steel">
            <a href="#" class="text-ink">Documentation</a>
            <a href="#" class="hover:text-ink transition-colors">Guides</a>
            <a href="#" class="hover:text-ink transition-colors">API Reference</a>
            <a href="#" class="hover:text-ink transition-colors">Changelog</a>
        </div>

        <div class="flex items-center gap-4">
            <a href="../auth/login.php" class="text-sm font-medium text-ink hover:text-slate transition-colors">Talk to us</a>
            <a href="../auth/login.php" class="bg-brand-green text-primary px-4 py-1.5 rounded-full text-sm font-medium hover:bg-brand-green-deep transition-colors">Get started</a>
        </div>
    </nav>

    <div class="flex flex-1 pt-[56px]">
        <!-- 3-Column Layout: Sidebar (Left) -->
        <aside class="w-[240px] fixed left-0 top-[56px] bottom-0 overflow-y-auto no-scrollbar border-r border-hairline bg-canvas p-4 hidden lg:block">
            <div class="space-y-6">
                <div>
                    <div class="text-[11px] font-semibold uppercase tracking-[0.5px] text-steel mb-2 px-3">Getting Started</div>
                    <div class="space-y-1">
                        <a href="#" class="sidebar-nav-item active block px-3 py-1.5 rounded-sm text-sm">Introduction</a>
                        <a href="#" class="sidebar-nav-item block px-3 py-1.5 rounded-sm text-sm">Quickstart</a>
                    </div>
                </div>
                
                <div>
                    <div class="text-[11px] font-semibold uppercase tracking-[0.5px] text-steel mb-2 px-3">Telemetry Data</div>
                    <div class="space-y-1">
                        <a href="article-view.php" class="sidebar-nav-item block px-3 py-1.5 rounded-sm text-sm">Recent Articles</a>
                        <a href="research-archive.php" class="sidebar-nav-item block px-3 py-1.5 rounded-sm text-sm">Research Archive</a>
                        <a href="sector-details.php" class="sidebar-nav-item block px-3 py-1.5 rounded-sm text-sm">Sector Analysis</a>
                    </div>
                </div>

                <div>
                    <div class="text-[11px] font-semibold uppercase tracking-[0.5px] text-steel mb-2 px-3">AI Intelligence</div>
                    <div class="space-y-1">
                        <a href="study-planner.php" class="sidebar-nav-item block px-3 py-1.5 rounded-sm text-sm">Study Planner</a>
                        <a href="../admin/dashboard.php" class="sidebar-nav-item block px-3 py-1.5 rounded-sm text-sm">Admin Dashboard</a>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Center Prose (Main Content) -->
        <main class="flex-1 lg:ml-[240px] lg:mr-[200px] p-8 md:p-12 max-w-[800px] w-full">
            <h1 class="text-[36px] font-semibold text-ink leading-[1.2] tracking-[-0.5px] mb-4">Introduction to Space Shutter</h1>
            <p class="text-[16px] text-slate leading-[1.5] mb-10 font-normal">
                Welcome to the official documentation for Project Vision. This dense developer-grade surface contains all automated aerospace ingestion reports parsed by the Gemini pipeline and safely persisted in Supabase.
            </p>

            <?php if ($heroArticle): ?>
            <div class="mb-12">
                <h2 class="text-[22px] font-semibold text-ink leading-[1.3] mb-4 border-b border-hairline-soft pb-2">Latest Featured Log</h2>
                <div class="bg-canvas border border-hairline rounded-lg overflow-hidden flex flex-col md:flex-row">
                    <div class="w-full md:w-1/3 bg-surface border-b md:border-b-0 md:border-r border-hairline relative">
                        <img src="<?= htmlspecialchars($heroArticle['image_url']) ?>" class="w-full h-full object-cover min-h-[200px]"/>
                    </div>
                    <div class="p-6 md:w-2/3 flex flex-col justify-center">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="bg-surface text-steel text-[13px] font-mono px-2 py-0.5 rounded-sm border border-hairline">ID: <?= htmlspecialchars($heroArticle['id']) ?></span>
                            <span class="bg-brand-green text-primary text-[11px] font-semibold uppercase tracking-[0.5px] px-2 py-0.5 rounded-full">New</span>
                        </div>
                        <h3 class="text-lg font-semibold text-ink mb-2"><?= htmlspecialchars($heroArticle['title']) ?></h3>
                        <p class="text-sm text-slate line-clamp-3 mb-4 leading-[1.5]"><?= htmlspecialchars($heroArticle['raw_abstract']) ?></p>
                        <a href="article-view.php?slug=<?= htmlspecialchars($heroArticle['slug']) ?>" class="text-sm font-medium text-ink hover:underline self-start">Read documentation &rarr;</a>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <h2 class="text-[22px] font-semibold text-ink leading-[1.3] mb-6">Recent Articles Registry</h2>
            <div class="space-y-4 mb-16">
                <?php foreach ($otherArticles as $article): ?>
                <div class="group border-b border-hairline-soft pb-4 last:border-0 hover:bg-surface-soft transition-colors p-4 -mx-4 rounded-lg">
                    <a href="article-view.php?slug=<?= htmlspecialchars($article['slug']) ?>" class="block">
                        <div class="flex justify-between items-start mb-2">
                            <h4 class="text-base font-semibold text-ink group-hover:text-brand-green transition-colors"><?= htmlspecialchars($article['title']) ?></h4>
                            <span class="text-[13px] text-steel font-mono"><?= date('Y-m-d', strtotime($article['created_at'])) ?></span>
                        </div>
                        <p class="text-sm text-slate line-clamp-2 leading-[1.5]"><?= htmlspecialchars($article['raw_abstract']) ?></p>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Example Property Row (from DESIGN.md) -->
            <h2 class="text-[22px] font-semibold text-ink leading-[1.3] mb-4 border-b border-hairline-soft pb-2">API References</h2>
            <div class="py-4 border-b border-hairline-soft">
                <div class="flex items-center gap-3 mb-1">
                    <code class="text-[13px] font-medium text-charcoal bg-surface px-1.5 py-0.5 rounded-xs border border-hairline">fetchSupabase()</code>
                    <span class="text-[13px] text-steel bg-surface px-1.5 py-0.5 rounded-sm font-mono">function</span>
                    <span class="text-[11px] font-semibold text-on-primary bg-[#d45656] px-1.5 py-0.5 rounded-sm uppercase tracking-[0.5px]">Required</span>
                </div>
                <p class="text-sm text-steel">The primary REST wrapper to retrieve securely parsed logs from the Project Vision database.</p>
            </div>
            
        </main>

        <!-- Right TOC (Table of Contents) -->
        <aside class="w-[200px] fixed right-0 top-[56px] bottom-0 border-l border-hairline bg-canvas p-6 hidden xl:block overflow-y-auto">
            <div class="text-[11px] font-semibold uppercase tracking-[0.5px] text-steel mb-4">On this page</div>
            <div class="space-y-1.5">
                <a href="#" class="block text-sm text-ink font-medium border-l-2 border-brand-green -ml-[25px] pl-[23px]">Introduction</a>
                <a href="#" class="block text-sm text-steel hover:text-ink">Latest Featured Log</a>
                <a href="#" class="block text-sm text-steel hover:text-ink">Recent Articles</a>
                <a href="#" class="block text-sm text-steel hover:text-ink">API References</a>
            </div>
        </aside>
    </div>

</body>
</html>