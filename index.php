<?php
require_once __DIR__ . '/config/api.php';

// Fetch top 3 recent automated articles from Supabase to show live data
$featured_articles = fetchSupabase('articles', 'select=*&order=created_at.desc&limit=3') ?? [];
?>
<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Space Shutter | Cosmic Discoveries Portal</title>
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
        .neon-glow { text-shadow: 0 0 10px rgba(98, 249, 238, 0.6); }
        body {
            background-color: #0b0c10;
            color: #e2e2e3;
        }
        .scanline {
            width: 100%;
            height: 1px;
            background: rgba(102, 252, 241, 0.3);
            position: absolute;
            top: 0;
            left: 0;
            animation: scan 4s linear infinite;
        }
        @keyframes scan {
            from { top: 0; }
            to { top: 100%; }
        }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-between antialiased font-body-md text-base overflow-x-hidden">

    <div class="fixed inset-0 pointer-events-none opacity-20 z-0">
        <div class="absolute top-8 left-8 font-code-data text-sm text-primary-fixed">COORD: 00.00.01 // GATEWAY</div>
        <div class="w-full h-full border border-outline-variant/10 m-4"></div>
    </div>

    <nav class="w-full max-w-7xl mx-auto px-6 py-5 flex justify-between items-center border-b border-outline-variant/30 z-50 relative">
        <div class="font-headline-md text-2xl tracking-widest text-primary-fixed neon-glow uppercase flex items-center gap-2">
            <span class="material-symbols-outlined">rocket_launch</span> SPACE SHUTTER
        </div>
        <div class="space-x-6">
            <a href="login.php" class="px-6 py-3 rounded-none bg-primary-fixed text-[#0b0c10] hover:bg-white hover:text-black transition-all font-label-caps font-bold tracking-widest text-sm border border-primary-fixed shadow-[0_0_15px_rgba(98,249,238,0.3)]">Login to Engine</a>
        </div>
    </nav>

    <header class="max-w-5xl mx-auto text-center px-6 my-20 relative z-10">
        <span class="font-code-data text-xs font-semibold tracking-widest text-secondary-fixed uppercase bg-surface-variant/30 px-4 py-2 rounded-none border border-secondary-fixed/50">NASA Discovery System Engine</span>
        <h1 class="font-headline-lg text-5xl md:text-7xl font-extrabold tracking-tight mt-8 mb-6 leading-tight uppercase text-white">
            Explore True Aerospace <br><span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-fixed to-secondary-fixed">Breakthroughs</span>
        </h1>
        <p class="font-body-md text-on-surface-variant text-lg max-w-3xl mx-auto leading-relaxed">
            A continuous automated pipeline compiling daily science archives, processed instantly via Gemini flash translation layers into readable operational briefings.
        </p>
        <div class="mt-12 flex justify-center gap-6">
            <a href="core-discovery.php" class="px-8 py-4 glass-panel border border-primary-fixed text-primary-fixed hover:bg-primary-fixed hover:text-black transition-colors font-label-caps font-bold tracking-widest text-sm flex items-center gap-2">
                <span class="material-symbols-outlined">explore</span> ENTER DEEP ARCHIVE
            </a>
        </div>
    </header>

    <main class="max-w-7xl w-full mx-auto px-6 mb-24 relative z-10">
        <h2 class="font-headline-md text-2xl font-bold mb-8 flex items-center gap-3 text-white uppercase tracking-wider border-b border-outline-variant/50 pb-4">
            <span class="w-2 h-6 bg-primary-fixed rounded-none"></span> Recent Log Entries
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php if (!empty($featured_articles)): foreach ($featured_articles as $article): ?>
                <a href="article-view.php?slug=<?= urlencode($article['slug'] ?? '') ?>" class="glass-panel overflow-hidden flex flex-col group hover:border-primary-fixed/50 transition duration-300 relative">
                    <div class="scanline hidden group-hover:block"></div>
                    <div class="h-48 bg-surface-container-lowest bg-cover bg-center border-b border-outline-variant/30 relative" style="background-image: url('<?= htmlspecialchars($article['image_url'] ?? 'https://images.unsplash.com/photo-1462331940025-496dfbfc7564?q=80&w=1024') ?>')">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0b0c10] to-transparent"></div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow relative z-10">
                        <span class="font-code-data text-[10px] font-semibold text-secondary-fixed tracking-[0.2em] uppercase mb-2">ID: <?= htmlspecialchars($article['category'] ?? 'UNKNOWN') ?></span>
                        <h3 class="font-headline-md text-xl text-white mb-3 group-hover:text-primary-fixed transition leading-snug"><?= htmlspecialchars($article['title']) ?></h3>
                        <p class="font-body-md text-on-surface-variant text-sm line-clamp-3 mb-6 flex-grow"><?= strip_tags($article['beautified_content'] ?? $article['raw_abstract'] ?? '') ?></p>
                        <div class="font-code-data text-[10px] text-outline pt-4 border-t border-outline-variant/30 uppercase tracking-widest">
                            Logged: <?= date('M d, Y', strtotime($article['created_at'] ?? 'now')) ?>
                        </div>
                    </div>
                </a>
            <?php endforeach; else: ?>
                <div class="col-span-3 text-center py-12 glass-panel">
                    <span class="material-symbols-outlined text-4xl text-outline mb-4">satellite_alt</span>
                    <p class="font-code-data text-outline tracking-widest uppercase">No telemetry records loaded into database matrix yet.<br>Run the T-002 cron ingestion engine.</p>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <footer class="w-full text-center py-8 border-t border-outline-variant/30 font-code-data text-xs text-on-surface-variant z-10 relative bg-[#0c0f0f]/80">
        &copy; 2144 SPACE SHUTTER WORKSPACE ENGINE. ALL TELEMETRY OPEN SOURCE VIA NASA API.
    </footer>

</body>
</html>
