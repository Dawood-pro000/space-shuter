<?php
require_once __DIR__ . '/config/api.php';
$articles = fetchSupabase('articles', 'select=id,title,slug,image_url,raw_abstract,created_at&order=created_at.desc&limit=10') ?? [];
$heroArticle = !empty($articles) ? $articles[0] : null;
$otherArticles = array_slice($articles, 1);
?>
<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Project Vision | Core Discovery Dashboard</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;900&amp;family=Space+Grotesk:wght@300;400;500;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "on-primary-container": "#00716b",
                    "primary-fixed": "#62f9ee",
                    "surface-bright": "#37393a",
                    "on-tertiary-container": "#5c6572",
                    "error-container": "#93000a",
                    "surface-dim": "#111415",
                    "tertiary-fixed": "#dae3f2",
                    "outline-variant": "#3c4948",
                    "on-secondary-fixed": "#00201f",
                    "inverse-on-surface": "#2e3132",
                    "surface-container-high": "#282a2b",
                    "tertiary": "#ffffff",
                    "primary-fixed-dim": "#3cdcd1",
                    "inverse-primary": "#006a64",
                    "on-error-container": "#ffdad6",
                    "surface-container-lowest": "#0c0f0f",
                    "secondary-fixed-dim": "#7bd6d1",
                    "primary-container": "#62f9ee",
                    "on-tertiary-fixed-variant": "#3e4753",
                    "surface-container-low": "#1a1c1d",
                    "on-surface-variant": "#bacac7",
                    "on-surface": "#e2e2e3",
                    "on-background": "#e2e2e3",
                    "secondary-container": "#007774",
                    "background": "#111415",
                    "on-primary-fixed": "#00201e",
                    "secondary": "#7bd6d1",
                    "on-secondary-fixed-variant": "#00504d",
                    "outline": "#859491",
                    "on-primary": "#003734",
                    "surface-tint": "#3cdcd1",
                    "inverse-surface": "#e2e2e3",
                    "surface-variant": "#333536",
                    "tertiary-fixed-dim": "#bec7d6",
                    "secondary-fixed": "#98f2ed",
                    "primary": "#ffffff",
                    "surface": "#111415",
                    "surface-container": "#1e2021",
                    "on-error": "#690005",
                    "tertiary-container": "#dae3f2",
                    "on-tertiary-fixed": "#131c27",
                    "error": "#ffb4ab",
                    "surface-container-highest": "#333536",
                    "on-tertiary": "#28313c",
                    "on-primary-fixed-variant": "#00504b",
                    "on-secondary-container": "#a1fcf7",
                    "on-secondary": "#003735"
            },
            "borderRadius": {
                    "DEFAULT": "0px",
                    "lg": "0px",
                    "xl": "0px",
                    "full": "9999px"
            },
            "spacing": {
                    "gutter": "24px",
                    "margin-mobile": "16px",
                    "margin-desktop": "64px",
                    "grid-cols": "12",
                    "unit": "4px"
            },
            "fontFamily": {
                    "body-md": ["Space Grotesk"],
                    "headline-md": ["Orbitron"],
                    "body-lg": ["Space Grotesk"],
                    "headline-lg-mobile": ["Orbitron"],
                    "label-caps": ["Space Grotesk"],
                    "headline-lg": ["Orbitron"],
                    "code-data": ["Space Grotesk"]
            },
            "fontSize": {
                    "body-md": ["16px", {"lineHeight": "1.5", "fontWeight": "400"}],
                    "headline-md": ["24px", {"lineHeight": "1.2", "letterSpacing": "0.02em", "fontWeight": "600"}],
                    "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                    "headline-lg-mobile": ["32px", {"lineHeight": "1.2", "fontWeight": "700"}],
                    "label-caps": ["12px", {"lineHeight": "1", "letterSpacing": "0.15em", "fontWeight": "700"}],
                    "headline-lg": ["48px", {"lineHeight": "1.1", "letterSpacing": "0.05em", "fontWeight": "700"}],
                    "code-data": ["14px", {"lineHeight": "1.4", "letterSpacing": "0.01em", "fontWeight": "500"}]
            }
          },
        },
      }
    </script>
<style>
        body {
            background-color: #0B0C10;
            color: #e2e2e3;
            overflow-x: hidden;
        }

        .glass-panel {
            background: rgba(31, 40, 51, 0.4);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(69, 162, 158, 0.3);
            position: relative;
        }

        .glass-panel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: #66FCF1;
            opacity: 0.8;
            box-shadow: 0 0 10px rgba(102, 252, 241, 0.5);
        }

        .scanline {
            width: 100%;
            height: 100px;
            z-index: 10;
            background: linear-gradient(0deg, rgba(102, 252, 241, 0) 0%, rgba(102, 252, 241, 0.1) 50%, rgba(102, 252, 241, 0) 100%);
            opacity: 0.1;
            position: absolute;
            pointer-events: none;
            animation: scan 8s linear infinite;
        }

        @keyframes scan {
            0% { top: -100px; }
            100% { top: 100%; }
        }

        .laser-glow {
            box-shadow: 0 0 15px rgba(102, 252, 241, 0.3);
        }

        .leader-line {
            position: absolute;
            background: #45A29E;
            opacity: 0.5;
        }

        /* Hide scrollbar but keep functionality */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<body class="font-body-md text-body-md selection:bg-primary-fixed selection:text-on-primary-fixed">
<!-- Top Navigation Bar -->
<header class="fixed top-0 left-0 w-full h-16 z-50 bg-surface-container-lowest/40 backdrop-blur-xl border-b border-outline-variant/30 flex justify-between items-center px-margin-desktop">
<div class="flex items-center gap-8">
<h1 class="font-headline-md text-headline-md text-primary-fixed tracking-widest uppercase">Project Vision</h1>
<nav class="hidden md:flex gap-6 items-center">
<a class="text-on-surface-variant hover:text-primary-fixed-dim transition-colors font-label-caps text-label-caps" href="#">Sectors</a>
<a class="text-primary-fixed font-bold border-b-2 border-primary-fixed pb-1 font-label-caps text-label-caps" href="#">Telemetry</a>
<a class="text-on-surface-variant hover:text-primary-fixed-dim transition-colors font-label-caps text-label-caps" href="#">Archive</a>
</nav>
</div>
<div class="flex items-center gap-4">
<div class="relative hidden sm:block">
<input class="bg-surface-container-low border-0 border-b border-outline-variant/50 focus:border-primary-fixed focus:ring-0 text-code-data font-code-data w-64 placeholder:text-outline/50 px-4 py-2" placeholder="QUERY DATABASE..." type="text"/>
<span class="material-symbols-outlined absolute right-2 top-1/2 -translate-y-1/2 text-outline text-[20px]">search</span>
</div>
<button class="text-on-surface-variant hover:text-primary-fixed transition-colors">
<span class="material-symbols-outlined">account_circle</span>
</button>
<button class="text-on-surface-variant hover:text-primary-fixed transition-colors">
<span class="material-symbols-outlined">settings</span>
</button>
</div>
</header>
<!-- Side Navigation Bar -->
<aside class="fixed left-0 top-0 h-full w-64 bg-surface-container-low/40 backdrop-blur-xl border-r border-outline-variant/30 flex flex-col pt-24 pb-8 z-40">
<div class="px-6 mb-12">
<div class="flex items-center gap-3 mb-4">
<div class="w-10 h-10 border border-primary-fixed/50 p-1">
<img class="w-full h-full object-cover" data-alt="A highly detailed close-up of a futuristic pilot avatar wearing a sleek obsidian black helmet with a cyan digital HUD glowing on the visor. The background is a dim, high-tech spaceship cockpit illuminated by faint amber and cyan light panels. The style is ultra-realistic sci-fi with sharp textures and atmospheric cinematic lighting." src="https://lh3.googleusercontent.com/aida-public/AB6AXuABe1TCR-Xx98-ImQItTmhpqKtSat98pyLWCuDUBSzISJiVvyEJuhi3KflsW8BHC6CUAWiZ8Y8PDX3ABZY2cQNmF0KPTsQEuW_hPjC168avfQZBgy2oe5uAv_Lw8S5UfmY6C9jEtCz8O9SROpLMbjhu60BfBceFLv5XpIdXDhRXQ2lrigCeZV0am7lHsYVbLmjeOIIkby4ofweF6Ylkj_LxqBC9nfIz_4US6H060L1jypfgnzA0MR9AKB6gKe2vtnow1KEO4i_gFfM"/>
</div>
<div>
<p class="font-label-caps text-[10px] text-outline uppercase tracking-widest">Operator</p>
<p class="font-code-data text-code-data text-primary-fixed">CMD_ELARA_9</p>
</div>
</div>
<div class="h-[1px] bg-outline-variant/30 w-full"></div>
</div>
<nav class="flex-1 flex flex-col">
<a class="flex items-center gap-4 px-6 py-4 text-on-surface-variant hover:bg-surface-variant/50 hover:text-secondary-fixed transition-all group" href="#">
<span class="material-symbols-outlined group-hover:scale-110 transition-transform">terminal</span>
<span class="font-label-caps text-label-caps">Command</span>
</a>
<a class="flex items-center gap-4 px-6 py-4 bg-secondary-container/20 text-secondary-fixed border-l-4 border-secondary-fixed scale-[0.98]" href="#">
<span class="material-symbols-outlined">radar</span>
<span class="font-label-caps text-label-caps">Sensors</span>
</a>
<a class="flex items-center gap-4 px-6 py-4 text-on-surface-variant hover:bg-surface-variant/50 hover:text-secondary-fixed transition-all group" href="#">
<span class="material-symbols-outlined group-hover:scale-110 transition-transform">settings_input_antenna</span>
<span class="font-label-caps text-label-caps">Comms</span>
</a>
<a class="flex items-center gap-4 px-6 py-4 text-on-surface-variant hover:bg-surface-variant/50 hover:text-secondary-fixed transition-all group" href="#">
<span class="material-symbols-outlined group-hover:scale-110 transition-transform">bolt</span>
<span class="font-label-caps text-label-caps">Energy</span>
</a>
<a class="flex items-center gap-4 px-6 py-4 text-on-surface-variant hover:bg-surface-variant/50 hover:text-secondary-fixed transition-all group" href="#">
<span class="material-symbols-outlined group-hover:scale-110 transition-transform">description</span>
<span class="font-label-caps text-label-caps">Logs</span>
</a>
</nav>
<div class="px-6 mt-auto">
<button class="w-full bg-secondary-container text-on-secondary-container py-3 font-label-caps text-label-caps tracking-widest hover:brightness-110 transition-all laser-glow">
                INITIATE SCAN
            </button>
<div class="mt-8 space-y-4">
<a class="flex items-center gap-3 text-outline hover:text-secondary-fixed text-[12px] font-code-data" href="#">
<span class="material-symbols-outlined text-[18px]">help</span>
                    Support
                </a>
<a class="flex items-center gap-3 text-outline hover:text-error text-[12px] font-code-data" href="#">
<span class="material-symbols-outlined text-[18px]">logout</span>
                    Exit
                </a>
</div>
</div>
</aside>
<!-- Main Content Canvas -->
<main class="ml-64 pt-24 px-gutter pb-24 min-h-screen">
<div class="max-w-[1400px] mx-auto grid grid-cols-12 gap-gutter">
<!-- Header Section -->
<div class="col-span-12 mb-8 flex justify-between items-end">
<div>
<p class="font-code-data text-primary-fixed mb-2 tracking-tighter opacity-70">SYSTEM_AUTH: VALIDATED // LEVEL_04_ACCESS</p>
<h2 class="font-headline-lg text-headline-lg uppercase text-on-surface">Discovery Feed</h2>
</div>
<div class="text-right hidden lg:block">
<p class="font-label-caps text-outline mb-1 uppercase">Stellar Timecode</p>
<p class="font-code-data text-headline-md text-secondary-fixed tracking-widest" id="clock">23:59:59:99</p>
</div>
</div>
<!-- Dashboard Feed (Bento Grid) -->
<div class="col-span-12 lg:col-span-9 space-y-gutter">
<!-- Hero Highlight Discovery -->
<section class="glass-panel group overflow-hidden h-[400px] flex">
<div class="scanline"></div>
<?php if ($heroArticle): ?>
<div class="w-2/3 relative">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="<?= htmlspecialchars($heroArticle['title']) ?>" src="<?= htmlspecialchars($heroArticle['image_url']) ?>"/>
<div class="absolute inset-0 bg-gradient-to-r from-transparent via-transparent to-surface-container-lowest/80"></div>
<div class="absolute top-4 left-4 p-2 bg-surface-container-lowest/80 border border-primary-fixed/30 text-primary-fixed font-code-data text-[10px]">
                            ID: <?= htmlspecialchars($heroArticle['id']) ?> | <?= date('Y-m-d', strtotime($heroArticle['created_at'])) ?>
                        </div>
</div>
<div class="w-1/3 p-8 flex flex-col justify-center bg-surface-container-lowest/40 backdrop-blur-md border-l border-outline-variant/30">
<h3 class="font-headline-md text-headline-md mb-4 uppercase text-on-surface"><?= htmlspecialchars($heroArticle['title']) ?></h3>
<p class="text-on-surface-variant font-body-md text-body-md mb-8 leading-relaxed line-clamp-4">
                            <?= htmlspecialchars($heroArticle['raw_abstract']) ?>
                        </p>
<a href="article-view.php?slug=<?= htmlspecialchars($heroArticle['slug']) ?>" class="border border-primary-fixed text-primary-fixed px-6 py-3 font-label-caps text-label-caps hover:bg-primary-fixed hover:text-on-primary-fixed transition-all flex items-center gap-2 group/btn self-start">
                            VIEW DATA
                            <span class="material-symbols-outlined text-[18px] group-hover/btn:translate-x-1 transition-transform">arrow_forward</span>
</a>
</div>
<?php else: ?>
<div class="w-full p-8 flex items-center justify-center text-outline font-code-data">NO NEW DISCOVERIES IN DATABASE. RUN FETCH SEQUENCE.</div>
<?php endif; ?>
</section>
<!-- Grid of Discoveries -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
<?php foreach ($otherArticles as $index => $article): ?>
<div class="glass-panel group p-6 hover:border-primary-fixed/60 transition-colors">
<div class="relative h-48 mb-6 overflow-hidden border border-outline-variant/30">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="<?= htmlspecialchars($article['title']) ?>" src="<?= htmlspecialchars($article['image_url']) ?>"/>
<div class="absolute top-2 right-2 text-[10px] font-code-data text-on-surface/50">#LOG-<?= $index + 1 ?></div>
</div>
<h4 class="font-headline-md text-[20px] mb-2 uppercase text-on-surface"><?= htmlspecialchars($article['title']) ?></h4>
<p class="text-on-surface-variant font-body-md text-body-md mb-6 line-clamp-2">
                            <?= htmlspecialchars($article['raw_abstract']) ?>
                        </p>
<div class="flex justify-between items-center">
<span class="font-code-data text-secondary-fixed text-[12px] uppercase">DATE: <?= date('Y-m-d', strtotime($article['created_at'])) ?></span>
<a href="article-view.php?slug=<?= htmlspecialchars($article['slug']) ?>" class="text-primary-fixed font-label-caps text-label-caps hover:underline">ANALYZE</a>
</div>
</div>
<?php endforeach; ?>
</div>
</div>
<!-- Sidebar Telemetry -->
<aside class="col-span-12 lg:col-span-3 space-y-gutter">
<div class="glass-panel p-6">
<h5 class="font-label-caps text-label-caps text-primary-fixed mb-6 border-b border-primary-fixed/20 pb-2 flex justify-between items-center">
                        LIVE TELEMETRY
                        <span class="w-2 h-2 bg-primary-fixed animate-pulse"></span>
</h5>
<div class="space-y-6">
<!-- Stat 1 -->
<div>
<div class="flex justify-between text-[11px] font-code-data text-outline mb-2">
<span>CURRENT VELOCITY</span>
<span class="text-primary-fixed">0.12c</span>
</div>
<div class="h-1 bg-surface-variant w-full overflow-hidden">
<div class="h-full bg-primary-fixed w-[65%]" style="box-shadow: 0 0 8px #62f9ee"></div>
</div>
</div>
<!-- Stat 2 -->
<div>
<div class="flex justify-between text-[11px] font-code-data text-outline mb-2">
<span>OXYGEN LEVELS</span>
<span class="text-primary-fixed">98.4%</span>
</div>
<div class="h-1 bg-surface-variant w-full overflow-hidden">
<div class="h-full bg-primary-fixed w-[98%]" style="box-shadow: 0 0 8px #62f9ee"></div>
</div>
</div>
<!-- Stat 3 -->
<div>
<div class="flex justify-between text-[11px] font-code-data text-outline mb-2">
<span>SHIELD INTEGRITY</span>
<span class="text-primary-fixed">82%</span>
</div>
<div class="h-1 bg-surface-variant w-full overflow-hidden">
<div class="h-full bg-primary-fixed w-[82%]" style="box-shadow: 0 0 8px #62f9ee"></div>
</div>
</div>
<!-- Stat 4 -->
<div class="pt-4 border-t border-outline-variant/30">
<div class="flex items-center justify-between mb-2">
<span class="text-[11px] font-code-data text-outline uppercase">Gemini Parsing</span>
<span class="px-2 py-0.5 bg-secondary-container/30 text-secondary-fixed text-[9px] font-code-data border border-secondary-fixed/30">ACTIVE</span>
</div>
<p class="text-[12px] text-on-surface-variant italic font-body-md">"Identifying potential tectonic activity on Target Kepler-186f..."</p>
</div>
</div>
</div>
<!-- Auxiliary Data Viz -->
<div class="glass-panel p-6 h-64 relative overflow-hidden flex items-center justify-center">
<div class="scanline"></div>
<div class="absolute inset-0 flex items-center justify-center">
<!-- Simplified radar effect with CSS -->
<div class="w-48 h-48 rounded-full border border-primary-fixed/20 relative flex items-center justify-center">
<div class="w-32 h-32 rounded-full border border-primary-fixed/20"></div>
<div class="w-16 h-16 rounded-full border border-primary-fixed/20"></div>
<div class="absolute w-full h-[1px] bg-primary-fixed/20"></div>
<div class="absolute h-full w-[1px] bg-primary-fixed/20"></div>
<div class="absolute top-1/2 left-1/2 w-1/2 h-[1px] bg-primary-fixed origin-left -rotate-45 animate-[spin_4s_linear_infinite]" style="box-shadow: 0 0 10px #62f9ee"></div>
</div>
</div>
<div class="absolute bottom-4 left-4 font-code-data text-[10px] text-outline">SCAN_SWEEP_ACTIVE</div>
</div>
<!-- Navigation Quick Links -->
<div class="space-y-2">
<button class="w-full text-left p-4 border border-outline-variant/30 hover:bg-surface-variant/20 transition-all group flex items-center justify-between">
<span class="font-label-caps text-label-caps">ORBITAL VIEW</span>
<span class="material-symbols-outlined text-outline group-hover:text-primary-fixed text-[18px]">travel_explore</span>
</button>
<button class="w-full text-left p-4 border border-outline-variant/30 hover:bg-surface-variant/20 transition-all group flex items-center justify-between">
<span class="font-label-caps text-label-caps">CARGO LOGS</span>
<span class="material-symbols-outlined text-outline group-hover:text-primary-fixed text-[18px]">inventory_2</span>
</button>
</div>
</aside>
</div>
</main>
<!-- Footer -->
<footer class="fixed bottom-0 left-0 w-full bg-surface-container-lowest/60 border-t border-outline-variant/30 flex justify-between items-center px-margin-desktop py-4 z-50">
<div class="flex gap-8 items-center">
<span class="font-label-caps text-label-caps text-on-surface">PROJECT VISION</span>
<span class="font-code-data text-code-data text-tertiary-fixed-dim">© 2144 DEEP SPACE ARCHIVE. COORDS: 42.00.01. STATUS: NOMINAL.</span>
</div>
<div class="flex gap-6 items-center">
<a class="font-code-data text-code-data text-outline hover:text-secondary-fixed transition-colors" href="#">Privacy Protocol</a>
<a class="font-code-data text-code-data text-outline hover:text-secondary-fixed transition-colors" href="#">Terms of Service</a>
</div>
</footer>
<script>
        // Digital Clock Update
        function updateClock() {
            const now = new Date();
            const h = String(now.getHours()).padStart(2, '0');
            const m = String(now.getMinutes()).padStart(2, '0');
            const s = String(now.getSeconds()).padStart(2, '0');
            const ms = String(Math.floor(Math.random() * 99)).padStart(2, '0');
            document.getElementById('clock').textContent = `${h}:${m}:${s}:${ms}`;
        }
        setInterval(updateClock, 50);

        // Interaction for buttons
        document.querySelectorAll('button').forEach(btn => {
            btn.addEventListener('mousedown', () => btn.classList.add('opacity-80'));
            btn.addEventListener('mouseup', () => btn.classList.remove('opacity-80'));
        });
    </script>
</body></html>