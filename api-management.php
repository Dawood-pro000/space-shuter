<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>STELLARIS_OS | API &amp; KEY MANAGEMENT</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700&amp;family=Space+Grotesk:wght@300;400;500;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "on-tertiary-fixed-variant": "#3e4753",
                    "secondary-container": "#007774",
                    "on-secondary": "#003735",
                    "primary-fixed": "#62f9ee",
                    "outline": "#859491",
                    "on-primary": "#003734",
                    "background": "#0B0C10",
                    "surface": "#111415",
                    "on-secondary-fixed": "#00201f",
                    "surface-container": "#1e2021",
                    "on-error-container": "#ffdad6",
                    "tertiary-fixed": "#dae3f2",
                    "on-primary-container": "#00716b",
                    "tertiary": "#ffffff",
                    "outline-variant": "#3c4948",
                    "on-error": "#690005",
                    "secondary-fixed-dim": "#7bd6d1",
                    "primary-container": "#62f9ee",
                    "on-background": "#e2e2e3",
                    "primary-fixed-dim": "#3cdcd1",
                    "inverse-on-surface": "#2e3132",
                    "surface-container-low": "#1a1c1d",
                    "inverse-surface": "#e2e2e3",
                    "surface-container-high": "#282a2b",
                    "primary": "#ffffff",
                    "surface-bright": "#37393a",
                    "error-container": "#93000a",
                    "secondary": "#7bd6d1",
                    "surface-container-highest": "#333536",
                    "on-tertiary-fixed": "#131c27",
                    "secondary-fixed": "#98f2ed",
                    "inverse-primary": "#006a64",
                    "on-secondary-container": "#a1fcf7",
                    "on-primary-fixed-variant": "#00504b",
                    "on-tertiary": "#28313c",
                    "on-surface": "#e2e2e3",
                    "surface-tint": "#3cdcd1",
                    "on-primary-fixed": "#00201e",
                    "tertiary-container": "#dae3f2",
                    "surface-variant": "#333536",
                    "error": "#ffb4ab",
                    "tertiary-fixed-dim": "#bec7d6",
                    "on-secondary-fixed-variant": "#00504d",
                    "surface-dim": "#111415",
                    "surface-container-lowest": "#0c0f0f",
                    "on-surface-variant": "#bacac7",
                    "on-tertiary-container": "#5c6572"
            },
            "borderRadius": {
                    "DEFAULT": "0rem",
                    "lg": "0rem",
                    "xl": "0rem",
                    "full": "9999px"
            },
            "spacing": {
                    "grid-cols": "12",
                    "margin-mobile": "16px",
                    "unit": "4px",
                    "margin-desktop": "64px",
                    "gutter": "24px"
            },
            "fontFamily": {
                    "label-caps": ["Space Grotesk"],
                    "headline-lg": ["Orbitron"],
                    "body-lg": ["Space Grotesk"],
                    "headline-md": ["Orbitron"],
                    "code-data": ["Space Grotesk"],
                    "headline-lg-mobile": ["Orbitron"],
                    "body-md": ["Space Grotesk"]
            },
            "fontSize": {
                    "label-caps": ["12px", {"lineHeight": "1", "letterSpacing": "0.15em", "fontWeight": "700"}],
                    "headline-lg": ["48px", {"lineHeight": "1.1", "letterSpacing": "0.05em", "fontWeight": "700"}],
                    "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                    "headline-md": ["24px", {"lineHeight": "1.2", "letterSpacing": "0.02em", "fontWeight": "600"}],
                    "code-data": ["14px", {"lineHeight": "1.4", "letterSpacing": "0.01em", "fontWeight": "500"}],
                    "headline-lg-mobile": ["32px", {"lineHeight": "1.2", "fontWeight": "700"}],
                    "body-md": ["16px", {"lineHeight": "1.5", "fontWeight": "400"}]
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
            border: 1px solid rgba(69, 162, 158, 0.2);
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
            opacity: 0;
            transition: opacity 0.3s;
        }
        .glass-panel:hover::before {
            opacity: 1;
        }
        .hud-scanline {
            width: 100%;
            height: 2px;
            background: linear-gradient(to right, transparent, #66FCF1, transparent);
            position: absolute;
            top: 0;
            animation: scan 4s linear infinite;
            opacity: 0.1;
            pointer-events: none;
        }
        @keyframes scan {
            0% { top: 0; }
            100% { top: 100%; }
        }
        .glow-text {
            text-shadow: 0 0 10px rgba(102, 252, 241, 0.5);
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }
    </style>
</head>
<body class="font-body-md text-body-md">
<!-- WebGL Shader Background -->

<!-- Navigation Shell (TopAppBar) -->
<header class="fixed top-0 left-0 w-full z-50 bg-surface/40 backdrop-blur-md border-b border-outline-variant shadow-[0_0_20px_rgba(60,220,209,0.15)] flex justify-between items-center px-margin-desktop py-4">
<div class="font-headline-md text-headline-md tracking-widest text-primary-fixed-dim">STELLARIS_OS</div>
<nav class="hidden md:flex items-center gap-8">
<a class="text-on-surface-variant font-label-caps text-label-caps hover:text-primary-fixed transition-all duration-300" href="#">SECTORS</a>
<a class="text-on-surface-variant font-label-caps text-label-caps hover:text-primary-fixed transition-all duration-300" href="#">TELEMETRY</a>
<a class="text-on-surface-variant font-label-caps text-label-caps hover:text-primary-fixed transition-all duration-300" href="#">ARCHIVE</a>
<a class="text-on-surface-variant font-label-caps text-label-caps hover:text-primary-fixed transition-all duration-300" href="#">COMMUNS</a>
</nav>
<div class="flex items-center gap-6">
<span class="material-symbols-outlined text-primary-fixed-dim cursor-pointer hover:opacity-80 transition-transform active:scale-95">sensors</span>
<span class="material-symbols-outlined text-primary-fixed-dim cursor-pointer hover:opacity-80 transition-transform active:scale-95">notifications</span>
<div class="flex items-center gap-2 border-l border-outline-variant pl-6">
<span class="material-symbols-outlined text-primary-fixed-dim">account_circle</span>
<span class="font-label-caps text-label-caps text-on-surface-variant">CDR. SHEPARD</span>
</div>
</div>
</header>
<!-- Side Navigation -->
<aside class="fixed left-0 top-0 h-full w-64 bg-surface-container-low/60 backdrop-blur-xl border-r border-outline-variant z-40 hidden md:flex flex-col pt-24 pb-8 px-6">
<div class="mb-10">
<div class="text-primary font-headline-md text-headline-md mb-1">DASHBOARD</div>
<div class="text-on-surface-variant font-code-data text-[10px] tracking-widest uppercase">Sub-system Access</div>
</div>
<div class="flex-grow flex flex-col gap-2">
<button class="flex items-center gap-4 px-4 py-3 text-on-surface-variant hover:bg-surface-variant/20 transition-all duration-200 group">
<span class="material-symbols-outlined">grid_view</span>
<span class="font-label-caps text-label-caps">DASHBOARD</span>
</button>
<button class="flex items-center gap-4 px-4 py-3 text-on-surface-variant hover:bg-surface-variant/20 transition-all duration-200 group">
<span class="material-symbols-outlined">explore</span>
<span class="font-label-caps text-label-caps">NAVIGATION</span>
</button>
<button class="flex items-center gap-4 px-4 py-3 text-on-surface-variant hover:bg-surface-variant/20 transition-all duration-200 group">
<span class="material-symbols-outlined">science</span>
<span class="font-label-caps text-label-caps">RESEARCH</span>
</button>
<button class="flex items-center gap-4 px-4 py-3 bg-secondary-container/30 text-secondary-fixed-dim border-l-4 border-secondary-fixed-dim transition-all duration-200">
<span class="material-symbols-outlined">settings_input_component</span>
<span class="font-label-caps text-label-caps">ENGINEERING</span>
</button>
<button class="flex items-center gap-4 px-4 py-3 text-on-surface-variant hover:bg-surface-variant/20 transition-all duration-200 group">
<span class="material-symbols-outlined">terminal</span>
<span class="font-label-caps text-label-caps">LOGS</span>
</button>
</div>
<div class="mt-auto border-t border-outline-variant pt-6 flex flex-col gap-2">
<button class="flex items-center gap-4 px-4 py-2 text-on-surface-variant hover:text-primary-fixed-dim transition-colors">
<span class="material-symbols-outlined">analytics</span>
<span class="font-label-caps text-label-caps">SYSTEMS</span>
</button>
<button class="flex items-center gap-4 px-4 py-2 text-on-surface-variant hover:text-primary-fixed-dim transition-colors">
<span class="material-symbols-outlined">logout</span>
<span class="font-label-caps text-label-caps">LOGOUT</span>
</button>
</div>
</aside>
<!-- Main Content Canvas -->
<main class="md:pl-64 pt-28 pb-20 px-margin-mobile md:px-margin-desktop min-h-screen relative z-10">
<!-- Breadcrumb & Header -->
<div class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-4">
<div>
<div class="flex items-center gap-2 font-code-data text-secondary-fixed-dim mb-2">
<span class="opacity-50">ENGINEERING</span>
<span class="material-symbols-outlined text-sm">chevron_right</span>
<span class="glow-text tracking-widest">API_MANAGEMENT</span>
</div>
<h1 class="font-headline-lg text-headline-lg md:text-headline-lg uppercase text-white leading-tight">API &amp; KEY MANAGEMENT</h1>
<p class="text-on-surface-variant font-body-md mt-2 max-w-xl">
                    Configuration node for Project Vision core assets. Manage Gemini engine keys, automated deployment streams, and cloud infrastructure connectivity.
                </p>
</div>
<div class="bg-secondary-container/10 border border-secondary/30 px-6 py-4 backdrop-blur-sm">
<div class="font-label-caps text-label-caps text-secondary-fixed-dim mb-1">SYSTEM_ENTROPY</div>
<div class="flex items-center gap-4">
<div class="w-32 h-1 bg-outline-variant overflow-hidden">
<div class="h-full bg-secondary-fixed-dim w-[14%] animate-pulse"></div>
</div>
<span class="font-code-data text-secondary-fixed-dim text-xs">0.0014 SEC_LATENCY</span>
</div>
</div>
</div>
<!-- Dashboard Grid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
<!-- API Key Registry (Bento Large) -->
<section class="lg:col-span-8 glass-panel p-8">
<div class="hud-scanline"></div>
<div class="flex justify-between items-center mb-8">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-secondary-fixed-dim">key</span>
<h2 class="font-headline-md text-headline-md">GEMINI_ENGINE_KEYS</h2>
</div>
<div class="font-code-data text-on-surface-variant text-xs">REF_ID: CORE-AI-MGMT-001</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="border-b border-outline-variant font-label-caps text-label-caps text-on-surface-variant">
<th class="pb-4 font-normal">KEY IDENTIFIER</th>
<th class="pb-4 font-normal">STATUS</th>
<th class="pb-4 font-normal">LAST USED</th>
<th class="pb-4 font-normal text-right">OPERATIONS</th>
</tr>
</thead>
<tbody class="font-code-data text-sm">
<tr class="border-b border-outline-variant/30 hover:bg-white/5 transition-colors group">
<td class="py-6 font-bold text-primary-fixed-dim tracking-wider">PV-ALPHA-01</td>
<td class="py-6">
<span class="bg-secondary-container/20 text-secondary-fixed-dim px-3 py-1 border border-secondary/30">ACTIVE</span>
</td>
<td class="py-6 text-on-surface-variant">2142-08-11 // 14:22:01</td>
<td class="py-6 text-right">
<button class="text-on-surface hover:text-secondary-fixed transition-colors border border-outline-variant px-4 py-2 hover:border-secondary-fixed uppercase text-xs font-bold">Regenerate</button>
</td>
</tr>
<tr class="border-b border-outline-variant/30 hover:bg-white/5 transition-colors group">
<td class="py-6 font-bold text-primary-fixed-dim tracking-wider">PV-BETA-42</td>
<td class="py-6">
<span class="bg-secondary-container/20 text-secondary-fixed-dim px-3 py-1 border border-secondary/30">ACTIVE</span>
</td>
<td class="py-6 text-on-surface-variant">2142-08-10 // 09:12:44</td>
<td class="py-6 text-right">
<button class="text-on-surface hover:text-secondary-fixed transition-colors border border-outline-variant px-4 py-2 hover:border-secondary-fixed uppercase text-xs font-bold">Regenerate</button>
</td>
</tr>
<tr class="border-b border-outline-variant/30 hover:bg-white/5 transition-colors group opacity-60">
<td class="py-6 font-bold text-outline tracking-wider">PV-GAMMA-09</td>
<td class="py-6">
<span class="bg-error-container/20 text-error px-3 py-1 border border-error/30">REVOKED</span>
</td>
<td class="py-6 text-on-surface-variant">2141-12-30 // 23:59:59</td>
<td class="py-6 text-right">
<button class="text-on-surface hover:text-secondary-fixed transition-colors border border-outline-variant px-4 py-2 hover:border-secondary-fixed uppercase text-xs font-bold">Restore</button>
</td>
</tr>
</tbody>
</table>
</div>
<div class="mt-8 flex items-center justify-between border-t border-outline-variant pt-6">
<div class="text-xs text-on-surface-variant font-code-data italic">Total Keys: 03 | Encrypted with AES-256-GCM</div>
<button class="bg-primary-fixed text-on-primary-fixed px-6 py-2 font-label-caps text-label-caps hover:brightness-110 transition-all shadow-[0_0_15px_rgba(102,252,241,0.3)] active:scale-95">NEW_IDENTIFIER</button>
</div>
</section>
<!-- Integration Settings (Sidebar Panel) -->
<section class="lg:col-span-4 flex flex-col gap-gutter">
<div class="glass-panel p-8">
<div class="flex items-center gap-3 mb-6">
<span class="material-symbols-outlined text-secondary-fixed-dim">tune</span>
<h2 class="font-headline-md text-headline-md">INTEGRATIONS</h2>
</div>
<div class="space-y-6">
<div class="flex items-center justify-between group">
<div>
<div class="font-label-caps text-label-caps text-white">AUTOMATED GENERATION</div>
<div class="font-code-data text-[10px] text-on-surface-variant">Protocol: AUTO-GEN-v2</div>
</div>
<label class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox"/>
<div class="w-11 h-5 bg-outline-variant peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-secondary-container"></div>
</label>
</div>
<div class="flex items-center justify-between group">
<div>
<div class="font-label-caps text-label-caps text-white">TELEMETRY STREAM</div>
<div class="font-code-data text-[10px] text-on-surface-variant">Real-time UDP sync</div>
</div>
<label class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox"/>
<div class="w-11 h-5 bg-outline-variant peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-secondary-container"></div>
</label>
</div>
<div class="flex items-center justify-between group">
<div>
<div class="font-label-caps text-label-caps text-white">AUTO-ROTATION</div>
<div class="font-code-data text-[10px] text-on-surface-variant">Security Protocol X-RAY</div>
</div>
<label class="relative inline-flex items-center cursor-pointer">
<input class="sr-only peer" type="checkbox"/>
<div class="w-11 h-5 bg-outline-variant peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-secondary-container"></div>
</label>
</div>
</div>
</div>
<!-- Railway HUD -->
<div class="glass-panel p-8 bg-surface-container-highest/20">
<div class="flex items-center justify-between mb-6">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-secondary-fixed-dim">terminal</span>
<h2 class="font-headline-md text-headline-md">RAILWAY HUD</h2>
</div>
<div class="flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-secondary-fixed-dim animate-ping"></span>
<span class="font-code-data text-[10px] text-secondary-fixed-dim">LIVE</span>
</div>
</div>
<div class="space-y-4 font-code-data">
<div class="flex justify-between items-center border-b border-outline-variant/30 pb-2">
<span class="text-on-surface-variant text-xs">UPTIME</span>
<span class="text-white">99.98% / 124d</span>
</div>
<div class="flex justify-between items-center border-b border-outline-variant/30 pb-2">
<span class="text-on-surface-variant text-xs">VERSION</span>
<span class="text-secondary-fixed-dim font-bold">v4.2.0-STABLE</span>
</div>
<div class="flex justify-between items-center border-b border-outline-variant/30 pb-2">
<span class="text-on-surface-variant text-xs">REGION</span>
<span class="text-white">US-EAST-1 (NYC)</span>
</div>
<div class="flex justify-between items-center border-b border-outline-variant/30 pb-2">
<span class="text-on-surface-variant text-xs">LOAD</span>
<span class="text-white">0.42 / 1.00</span>
</div>
</div>
<div class="mt-6">
<button class="w-full border border-secondary-fixed-dim text-secondary-fixed-dim py-3 font-label-caps text-label-caps hover:bg-secondary-container/20 transition-all flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-sm">rocket_launch</span>
                            RE-DEPLOY INSTANCE
                        </button>
</div>
</div>
</section>
<!-- Storage Config (Full Width Bottom) -->
<section class="lg:col-span-12 glass-panel p-8">
<div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-8 gap-4">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-secondary-fixed-dim">cloud_sync</span>
<div>
<h2 class="font-headline-md text-headline-md">STORAGE_CONFIG</h2>
<div class="font-code-data text-xs text-on-surface-variant">Cloudinary / AWS S3 Connection Pulse</div>
</div>
</div>
<div class="bg-secondary-container/20 px-4 py-2 border border-secondary/30 flex items-center gap-3">
<span class="material-symbols-outlined text-secondary-fixed-dim" data-weight="fill">check_circle</span>
<span class="font-label-caps text-label-caps text-secondary-fixed-dim">HEALTH: OPTIMAL</span>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-12">
<!-- Bucket Occupancy -->
<div class="space-y-4">
<div class="flex justify-between font-label-caps text-[10px] text-on-surface-variant uppercase">
<span>Bucket Occupancy</span>
<span>42.8 GB / 100 GB</span>
</div>
<div class="w-full h-8 bg-surface-container-highest border border-outline-variant relative overflow-hidden">
<div class="h-full bg-primary-fixed-dim/40 w-[42.8%] border-r border-primary-fixed"></div>
<div class="absolute inset-0 flex items-center justify-center font-code-data text-xs mix-blend-difference">42.8% CAPACITY</div>
</div>
</div>
<!-- Bandwidth Usage -->
<div class="space-y-4">
<div class="flex justify-between font-label-caps text-[10px] text-on-surface-variant uppercase">
<span>Egress Bandwidth (MTD)</span>
<span>12.4 TB / 20 TB</span>
</div>
<div class="w-full h-8 bg-surface-container-highest border border-outline-variant relative overflow-hidden">
<div class="h-full bg-secondary-fixed-dim/40 w-[62%] border-r border-secondary-fixed"></div>
<div class="absolute inset-0 flex items-center justify-center font-code-data text-xs mix-blend-difference">62.0% BANDWIDTH</div>
</div>
</div>
<!-- Sync Status -->
<div class="space-y-4">
<div class="font-label-caps text-[10px] text-on-surface-variant uppercase">Infrastructure Nodes</div>
<div class="flex gap-2">
<div class="flex-1 bg-surface-container-highest border border-secondary-fixed-dim/50 p-2 text-center">
<div class="font-code-data text-[10px] text-secondary-fixed-dim">CLOUDINARY</div>
<div class="text-[10px] text-on-surface-variant">ACTIVE</div>
</div>
<div class="flex-1 bg-surface-container-highest border border-outline-variant p-2 text-center">
<div class="font-code-data text-[10px] text-on-surface-variant">AWS S3</div>
<div class="text-[10px] text-on-surface-variant">STANDBY</div>
</div>
<div class="flex-1 bg-surface-container-highest border border-outline-variant p-2 text-center">
<div class="font-code-data text-[10px] text-on-surface-variant">REDIS_CACHE</div>
<div class="text-[10px] text-on-surface-variant">SYNCING</div>
</div>
</div>
</div>
</div>
</section>
</div>
<!-- System Visual Decor -->
<div class="fixed bottom-12 right-12 opacity-30 pointer-events-none hidden xl:block">
<div class="text-[100px] font-bold font-headline-lg leading-none select-none text-outline-variant">VISION</div>
<div class="font-code-data text-xs tracking-[1em] text-right mt-[-20px]">PROJECT_OS_v4</div>
</div>
</main>
<!-- Footer Shell -->
<footer class="w-full bg-surface-dim border-t border-outline-variant py-4 px-margin-desktop flex flex-col md:flex-row justify-between items-center gap-4 relative z-50">
<div class="font-label-caps text-label-caps text-primary">© 2142 STAR-LINK SYSTEMS | CORE_v4.2.0-STABLE</div>
<div class="flex flex-wrap justify-center gap-6 font-code-data text-code-data text-on-surface-variant">
<span class="hover:text-secondary-fixed transition-colors cursor-default">SYS_STATUS: OPTIMAL</span>
<span class="hover:text-secondary-fixed transition-colors cursor-default">COORD: 42.08.11</span>
<span class="hover:text-secondary-fixed transition-colors cursor-default">LATENCY: 14MS</span>
<span class="hover:text-secondary-fixed transition-colors cursor-pointer border-b border-secondary-fixed-dim/0 hover:border-secondary-fixed-dim">DEEP_SPACE_PROTOCOLS</span>
</div>
</footer>
<!-- Interactive Layer: FAB (Only where relevant) -->
<button class="fixed bottom-8 right-8 w-16 h-16 bg-primary-fixed text-on-primary-fixed shadow-[0_0_20px_rgba(102,252,241,0.5)] flex items-center justify-center group transition-all duration-300 hover:scale-110 active:scale-95 z-[60] md:hidden">
<span class="material-symbols-outlined text-3xl">add</span>
</button>
<script>
        // Micro-interactions for terminal effect
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('mousedown', () => {
                button.style.transform = 'scale(0.95)';
            });
            button.addEventListener('mouseup', () => {
                button.style.transform = 'scale(1)';
            });
        });

        // Simulating data updates
        setInterval(() => {
            const uptime = document.querySelector('span:contains("124d")');
            // Logic for visual updates could go here
        }, 5000);
    </script>
</body></html>