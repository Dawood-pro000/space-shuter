<?php
require_once __DIR__ . '/config/api.php';

$slug = $_GET['slug'] ?? '';
if (!$slug) {
    header('Location: /core-discovery.php');
    exit;
}

$response = fetchSupabase('articles', 'slug=eq.' . urlencode($slug) . '&select=*');
if (!$response || empty($response)) {
    header('Location: /core-discovery.php');
    exit;
}
$article = $response[0];

$title = htmlspecialchars($article['title']);
$author = htmlspecialchars($article['source_author'] ?? 'NASA');
$category = htmlspecialchars($article['category'] ?? 'space');
$imageUrl = htmlspecialchars($article['image_url'] ?? '');
$content = $article['beautified_content'] ?? htmlspecialchars($article['raw_abstract']);
$date = date('M d, Y', strtotime($article['created_at'] ?? 'now'));
?>
<!DOCTYPE html>
<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title><?= $title ?> | Project Vision</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;800&amp;family=Space+Grotesk:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
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
            "fontFamily": {
                    "body-md": ["Space Grotesk"],
                    "body-lg": ["Space Grotesk"],
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
        body {
            background-color: #0b0c10;
            color: #e2e2e3;
        }
        
        /* Typography styles for the Gemini generated HTML */
        .article-content h1, .article-content h2, .article-content h3 {
            font-family: 'Orbitron', sans-serif;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-top: 2rem;
            margin-bottom: 1rem;
            border-bottom: 1px solid #62f9ee;
            padding-bottom: 0.5rem;
            width: max-content;
            padding-right: 2rem;
        }
        .article-content h1 { font-size: 24px; }
        .article-content h2 { font-size: 20px; }
        .article-content h3 { font-size: 16px; }
        .article-content p {
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }
        .article-content strong {
            color: #62f9ee;
        }
        .article-content ul {
            list-style-type: square;
            padding-left: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .article-content li {
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body class="antialiased font-body-md text-base overflow-x-hidden">
<div class="fixed inset-0 pointer-events-none opacity-20 z-0">
    <div class="absolute top-8 left-8 font-code-data text-sm text-primary-fixed">COORD: 42.00.01 // DEEP_ARCHIVE</div>
    <div class="absolute bottom-8 right-8 font-code-data text-sm text-primary-fixed">SECURE_CHANNEL_V2.4</div>
    <div class="w-full h-full border border-outline-variant/10 m-4"></div>
</div>

<header class="flex justify-between items-center w-full px-8 h-16 z-50 bg-[#0c0f0f]/80 backdrop-blur-xl border-b border-outline-variant/30 fixed top-0 left-0">
    <a href="/core-discovery.php" class="font-headline-md text-xl text-primary-fixed tracking-widest uppercase hover:text-white transition-colors">Project Vision</a>
    <nav class="hidden md:flex items-center gap-8">
        <a class="text-on-surface-variant hover:text-primary-fixed transition-colors font-body-md" href="#">Sectors</a>
        <a class="text-on-surface-variant hover:text-primary-fixed transition-colors font-body-md" href="#">Telemetry</a>
        <a class="text-primary-fixed font-bold border-b-2 border-primary-fixed pb-1 font-body-md" href="/core-discovery.php">Archive</a>
    </nav>
    <div class="flex items-center gap-6">
        <span class="material-symbols-outlined text-primary-fixed cursor-pointer">account_circle</span>
        <span class="material-symbols-outlined text-primary-fixed cursor-pointer">settings</span>
    </div>
</header>

<main class="pt-16 min-h-screen relative z-10 max-w-7xl mx-auto">
    <section class="relative h-[400px] w-full overflow-hidden mt-8 rounded-xl border border-outline-variant/50">
        <div class="absolute inset-0 bg-gradient-to-t from-[#0b0c10] via-[#0b0c10]/40 to-transparent z-20"></div>
        <div class="absolute inset-0 z-10 bg-cover bg-center" style="background-image: url('<?= $imageUrl ?: 'https://images.unsplash.com/photo-1462331940025-496dfbfc7564?q=80&w=2048' ?>')"></div>
        <div class="absolute bottom-12 left-12 z-30 max-w-4xl pr-8">
            <div class="font-code-data text-sm text-primary-fixed mb-3 tracking-[0.3em] uppercase">SYSTEM.RESEARCH_ARCHIVE // ID: <?= strtoupper($category) ?></div>
            <h1 class="font-headline-lg text-3xl md:text-5xl text-white uppercase leading-tight"><?= $title ?></h1>
        </div>
    </section>

    <section class="px-4 md:px-12 py-12 grid grid-cols-12 gap-12">
        <div class="hidden xl:col-span-2 xl:flex flex-col gap-8">
            <div class="border-l-2 border-primary-fixed pl-4">
                <span class="font-code-data text-[10px] text-primary-fixed block uppercase">Classification</span>
                <span class="font-label-caps text-sm text-white">LEVEL-5</span>
            </div>
            <div class="border-l-2 border-outline-variant pl-4">
                <span class="font-code-data text-[10px] text-outline block uppercase">Source Author</span>
                <span class="font-label-caps text-sm text-white"><?= $author ?></span>
            </div>
            <div class="border-l-2 border-outline-variant pl-4">
                <span class="font-code-data text-[10px] text-outline block uppercase">Date Logged</span>
                <span class="font-label-caps text-sm text-secondary-fixed"><?= $date ?></span>
            </div>
            <a href="/core-discovery.php" class="mt-8 flex items-center gap-2 text-primary-fixed hover:text-white transition-colors font-code-data text-sm uppercase">
                <span class="material-symbols-outlined">arrow_back</span> Return to Hub
            </a>
        </div>

        <div class="col-span-12 xl:col-span-7 space-y-12">
            <div class="glass-panel p-8 relative overflow-hidden">
                <div class="scanline"></div>
                <div class="flex items-center gap-2 mb-6">
                    <span class="w-2 h-2 bg-primary-fixed rounded-full animate-pulse"></span>
                    <h2 class="font-headline-md text-xl text-white uppercase tracking-wider">Analysis Report</h2>
                </div>
                
                <div class="article-content text-lg text-on-surface-variant">
                    <?= $content ?>
                </div>
            </div>
        </div>

        <div class="col-span-12 xl:col-span-3 space-y-8">
            <div class="space-y-4">
                <button class="w-full h-16 glass-panel border-primary-fixed border-2 flex items-center justify-center gap-4 group hover:bg-primary-fixed hover:text-[#0b0c10] transition-all duration-300">
                    <span class="material-symbols-outlined group-hover:scale-125 transition-transform">download</span>
                    <span class="font-label-caps font-bold tracking-wider text-sm">EXPORT TELEMETRY</span>
                </button>
            </div>

            <div class="glass-panel p-4 space-y-3 opacity-60 mt-12">
                <div class="font-code-data text-[10px] text-outline uppercase border-b border-outline-variant pb-1">System Feed</div>
                <div class="font-code-data text-[11px] text-secondary-fixed">PING: Archive_Server-01 [9ms]</div>
                <div class="font-code-data text-[11px] text-secondary-fixed">ENCRYPTION: AES-4096-QUANTUM</div>
                <div class="font-code-data text-[11px] text-secondary-fixed">STATUS: ARCHIVE_IMMUTABLE</div>
            </div>
        </div>
    </section>
</main>

<footer class="flex justify-between items-center w-full px-8 py-6 z-50 bg-[#0c0f0f]/80 border-t border-outline-variant/30 mt-12">
    <div class="font-code-data text-xs text-on-surface-variant">
        © 2144 DEEP SPACE ARCHIVE. COORDS: 42.00.01. STATUS: NOMINAL.
    </div>
</footer>

<script>
    const coordDisplay = document.querySelector('.absolute.top-8.left-8');
    setInterval(() => {
        const rand = Math.random().toFixed(2);
        if(coordDisplay) coordDisplay.innerText = `COORD: 42.00.${rand} // DEEP_ARCHIVE`;
    }, 5000);
</script>
</body></html>