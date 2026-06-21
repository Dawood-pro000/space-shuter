<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>STELLARIS_OS | SYSTEM TELEMETRY</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800;900&amp;family=Space+Grotesk:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
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
                        "background": "#111415",
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
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
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
            background-color: #0b0c10;
            color: #e2e2e3;
            overflow-x: hidden;
            font-family: 'Space Grotesk', sans-serif;
        }
        .glass-panel {
            background: rgba(31, 40, 51, 0.4);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(60, 73, 72, 0.5);
            position: relative;
        }
        .scanline {
            width: 100%;
            height: 2px;
            background: rgba(102, 252, 241, 0.1);
            position: absolute;
            top: 0;
            left: 0;
            animation: scan 8s linear infinite;
            pointer-events: none;
        }
        @keyframes scan {
            0% { top: 0; opacity: 0; }
            5% { opacity: 1; }
            95% { opacity: 1; }
            100% { top: 100%; opacity: 0; }
        }
        .hud-border {
            border-top: 2px solid #66FCF1;
            box-shadow: 0 -5px 15px rgba(102, 252, 241, 0.1);
        }
        .status-glow {
            box-shadow: 0 0 10px rgba(102, 252, 241, 0.4);
        }
        ::-webkit-scrollbar {
            width: 4px;
        }
        ::-webkit-scrollbar-track {
            background: rgba(11, 12, 16, 0.5);
        }
        ::-webkit-scrollbar-thumb {
            background: #45A29E;
        }
    </style>
</head>
<body class="flex min-h-screen">
<!-- SideNavBar -->
<aside class="fixed left-0 top-0 h-full w-64 bg-surface-container-low/60 backdrop-blur-xl border-r border-outline-variant flex flex-col py-8 z-50">
<div class="px-6 mb-12">
<h1 class="font-headline-md text-headline-md text-primary tracking-widest">STELLARIS_OS</h1>
</div>
<nav class="flex-1 px-4 space-y-2">
<a class="flex items-center gap-4 px-4 py-3 text-on-surface-variant hover:bg-surface-variant/20 transition-all duration-200" href="#">
<span class="material-symbols-outlined">grid_view</span>
<span class="font-label-caps text-label-caps">DASHBOARD</span>
</a>
<a class="flex items-center gap-4 px-4 py-3 bg-secondary-container/30 text-secondary-fixed-dim border-l-4 border-secondary-fixed-dim transition-all duration-200" href="#">
<span class="material-symbols-outlined">explore</span>
<span class="font-label-caps text-label-caps">NAVIGATION</span>
</a>
<a class="flex items-center gap-4 px-4 py-3 text-on-surface-variant hover:bg-surface-variant/20 transition-all duration-200" href="#">
<span class="material-symbols-outlined">science</span>
<span class="font-label-caps text-label-caps">RESEARCH</span>
</a>
<a class="flex items-center gap-4 px-4 py-3 text-on-surface-variant hover:bg-surface-variant/20 transition-all duration-200" href="#">
<span class="material-symbols-outlined">settings_input_component</span>
<span class="font-label-caps text-label-caps">ENGINEERING</span>
</a>
<a class="flex items-center gap-4 px-4 py-3 text-on-surface-variant hover:bg-surface-variant/20 transition-all duration-200" href="#">
<span class="material-symbols-outlined">terminal</span>
<span class="font-label-caps text-label-caps">LOGS</span>
</a>
</nav>
<div class="mt-auto px-6 space-y-6">
<div class="flex items-center gap-3 py-4 border-t border-outline-variant">
<div class="w-10 h-10 bg-secondary-container rounded-sm flex items-center justify-center">
<span class="material-symbols-outlined text-secondary-fixed">person</span>
</div>
<div>
<p class="font-body-md text-body-md text-secondary-fixed-dim">CDR. SHEPARD</p>
<p class="text-[10px] text-on-surface-variant font-label-caps">SECTOR-7G // ACTIVE</p>
</div>
</div>
<button class="w-full bg-primary-fixed text-on-primary py-3 font-label-caps text-label-caps tracking-widest hover:bg-white transition-all status-glow">
                INITIATE WARP
            </button>
</div>
</aside>
<main class="flex-1 ml-64 min-h-screen flex flex-col relative">
<!-- TopAppBar -->
<header class="sticky top-0 z-40 bg-surface/40 backdrop-blur-md border-b border-outline-variant px-margin-desktop py-4 flex justify-between items-center w-full">
<div class="flex items-center gap-8">
<div class="font-headline-md text-headline-md tracking-widest text-primary-fixed-dim">SYSTEM TELEMETRY</div>
<nav class="hidden md:flex gap-6">
<a class="text-on-surface-variant font-label-caps text-label-caps hover:text-primary-fixed transition-all" href="#">SECTORS</a>
<a class="text-primary-fixed border-b-2 border-primary-fixed pb-1 font-label-caps text-label-caps" href="#">TELEMETRY</a>
<a class="text-on-surface-variant font-label-caps text-label-caps hover:text-primary-fixed transition-all" href="#">ARCHIVE</a>
<a class="text-on-surface-variant font-label-caps text-label-caps hover:text-primary-fixed transition-all" href="#">COMMUNS</a>
</nav>
</div>
<div class="flex items-center gap-6">
<div class="relative">
<input class="bg-surface-container-low border-b border-outline-variant px-4 py-1 text-sm focus:border-primary-fixed outline-none w-64 font-code-data" placeholder="QUERY DATABASE..." type="text"/>
</div>
<div class="flex gap-4">
<span class="material-symbols-outlined text-primary-fixed-dim cursor-pointer hover:opacity-80 transition-transform active:scale-95">sensors</span>
<span class="material-symbols-outlined text-primary-fixed-dim cursor-pointer hover:opacity-80 transition-transform active:scale-95">notifications</span>
<span class="material-symbols-outlined text-primary-fixed-dim cursor-pointer hover:opacity-80 transition-transform active:scale-95">account_circle</span>
</div>
</div>
</header>
<!-- Content Canvas -->
<div class="flex-1 p-8 overflow-y-auto bg-[#0b0c10] space-y-8">
<!-- System Health HUD -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
<div class="glass-panel p-6 hud-border">
<div class="flex justify-between items-start mb-4">
<span class="font-label-caps text-label-caps text-on-surface-variant">CORE STABILITY</span>
<span class="font-code-data text-primary-fixed-dim">98.4%</span>
</div>
<div class="w-full bg-surface-container-highest h-1">
<div class="bg-primary-fixed h-full status-glow" style="width: 98.4%"></div>
</div>
<div class="mt-4 flex gap-2">
<div class="w-1 h-3 bg-primary-fixed/40"></div>
<div class="w-1 h-3 bg-primary-fixed/40"></div>
<div class="w-1 h-3 bg-primary-fixed/40"></div>
<div class="w-1 h-3 bg-primary-fixed/40"></div>
<div class="w-1 h-3 bg-primary-fixed/10"></div>
</div>
</div>
<div class="glass-panel p-6 hud-border">
<div class="flex justify-between items-start mb-4">
<span class="font-label-caps text-label-caps text-on-surface-variant">DATABASE LATENCY</span>
<span class="font-code-data text-primary-fixed-dim">14MS</span>
</div>
<div class="w-full bg-surface-container-highest h-1">
<div class="bg-secondary-fixed-dim h-full" style="width: 15%"></div>
</div>
<div class="mt-4 font-code-data text-[10px] text-on-surface-variant">OPTIMAL THRESHOLD: &lt; 50MS</div>
</div>
<div class="glass-panel p-6 hud-border">
<div class="flex justify-between items-start mb-4">
<span class="font-label-caps text-label-caps text-on-surface-variant">CPU LOAD</span>
<span class="font-code-data text-primary-fixed-dim">42%</span>
</div>
<div class="w-full bg-surface-container-highest h-1">
<div class="bg-primary-fixed h-full" style="width: 42%"></div>
</div>
<div class="mt-4 flex gap-1">
<span class="w-2 h-1 bg-primary-fixed/60"></span>
<span class="w-2 h-1 bg-primary-fixed/60"></span>
<span class="w-2 h-1 bg-surface-variant"></span>
<span class="w-2 h-1 bg-surface-variant"></span>
</div>
</div>
</section>
<div class="grid grid-cols-12 gap-gutter">
<!-- Gemini Engine Status -->
<div class="col-span-12 lg:col-span-8 glass-panel p-6 overflow-hidden">
<div class="scanline"></div>
<div class="flex justify-between items-center mb-8">
<h2 class="font-headline-md text-headline-md text-primary flex items-center gap-3">
<span class="material-symbols-outlined text-primary-fixed">dynamic_form</span>
                            GEMINI ENGINE STATUS
                        </h2>
<div class="font-code-data text-xs text-on-surface-variant">V3.5_PROTO_B</div>
</div>
<div class="grid grid-cols-3 gap-4 mb-8">
<div class="border border-outline-variant p-4">
<div class="text-[10px] font-label-caps text-on-surface-variant mb-1">KEY_ALPHA</div>
<div class="flex items-center gap-2">
<div class="w-2 h-2 rounded-full bg-primary-fixed status-glow"></div>
<span class="font-code-data text-primary-fixed">ACTIVE</span>
</div>
</div>
<div class="border border-outline-variant p-4">
<div class="text-[10px] font-label-caps text-on-surface-variant mb-1">KEY_BETA</div>
<div class="flex items-center gap-2">
<div class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></div>
<span class="font-code-data text-amber-400">ROTATING</span>
</div>
</div>
<div class="border border-outline-variant p-4 opacity-50">
<div class="text-[10px] font-label-caps text-on-surface-variant mb-1">KEY_GAMMA</div>
<div class="flex items-center gap-2">
<div class="w-2 h-2 rounded-full bg-on-surface-variant"></div>
<span class="font-code-data text-on-surface-variant">STANDBY</span>
</div>
</div>
</div>
<div class="h-48 w-full border-b border-outline-variant relative">
<!-- Technical Line Graph Placeholder -->
<div class="absolute inset-0 flex items-end">
<svg class="w-full h-full" preserveaspectratio="none" viewbox="0 0 100 100">
<path d="M0 80 L10 75 L20 85 L30 60 L40 65 L50 40 L60 45 L70 20 L80 30 L90 10 L100 15" fill="none" stroke="#66FCF1" stroke-width="0.5"></path>
<path d="M0 80 L10 75 L20 85 L30 60 L40 65 L50 40 L60 45 L70 20 L80 30 L90 10 L100 15 V100 H0 Z" fill="url(#grad1)" opacity="0.1"></path>
<defs>
<lineargradient id="grad1" x1="0%" x2="0%" y1="0%" y2="100%">
<stop offset="0%" style="stop-color:#66FCF1;stop-opacity:1"></stop>
<stop offset="100%" style="stop-color:#66FCF1;stop-opacity:0"></stop>
</lineargradient>
</defs>
</svg>
</div>
<div class="absolute top-0 right-0 font-code-data text-[10px] text-primary-fixed-dim bg-background px-2">TOKEN_THROTTLE: 850/SEC</div>
</div>
</div>
<!-- System Controls -->
<div class="col-span-12 lg:col-span-4 flex flex-col gap-gutter">
<div class="glass-panel p-6 border-l-4 border-error h-full">
<h3 class="font-label-caps text-label-caps text-error mb-4">CRITICAL SYSTEM OVERRIDE</h3>
<p class="text-xs text-on-surface-variant mb-6 font-body-md leading-relaxed">
                            Warning: Direct intervention in core processes may cause telemetry desync or database corruption. Proceed with active authorization only.
                        </p>
<div class="space-y-4">
<button class="w-full border border-error text-error py-3 font-label-caps text-label-caps hover:bg-error/10 transition-colors flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-sm">restart_alt</span>
                                INITIATE SYSTEM REBOOT
                            </button>
<button class="w-full border border-outline-variant text-on-surface py-3 font-label-caps text-label-caps hover:bg-surface-variant transition-colors flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-sm">delete_sweep</span>
                                FLUSH CACHE
                            </button>
</div>
</div>
<div class="glass-panel p-6">
<div class="text-[10px] font-label-caps text-on-surface-variant mb-2">AUTH_TOKEN_LIFETIME</div>
<div class="font-code-data text-2xl text-primary-fixed tracking-widest">04:59:12</div>
<div class="mt-4 text-[10px] font-label-caps text-secondary-fixed-dim">UPTIME: 142D 04H 22M</div>
</div>
</div>
<!-- Cron Job Logs -->
<div class="col-span-12 lg:col-span-6 glass-panel p-6 flex flex-col h-[400px]">
<div class="flex justify-between items-center mb-4">
<h3 class="font-label-caps text-label-caps text-primary flex items-center gap-2">
<span class="material-symbols-outlined text-sm">history</span>
                            DISCOVERY_FETCH_LOGS
                        </h3>
<div class="flex gap-1">
<div class="w-2 h-2 rounded-full bg-primary-fixed status-glow animate-pulse"></div>
<span class="text-[10px] font-code-data text-primary-fixed">LIVE</span>
</div>
</div>
<div class="flex-1 bg-surface-container-lowest font-mono text-[11px] p-4 overflow-y-auto border border-outline-variant text-primary-fixed/80 leading-loose">
<p>[14:00:00] INIT SCAN... COMMENCING SECTOR 7 ANALYSIS</p>
<p>[14:00:12] 4 NEW SECTORS DETECTED: [A1, B4, C9, X2]</p>
<p>[14:00:45] DATA PARSED BY GEMINI_ALPHA (TOKENS: 4,212)</p>
<p>[14:01:02] DATABASE HANDSHAKE SUCCESSFUL - SUPABASE_PRIMARY</p>
<p>[14:05:00] RE-INITIALIZING TELEMETRY STACK...</p>
<p class="text-on-surface-variant">[14:10:00] STANDBY - WAITING FOR NEXT POLLING CYCLE</p>
<p>[15:00:00] POLLING CYCLE 412 START...</p>
<p>[15:00:22] CACHE HIT: 94.2%</p>
<p>[15:00:30] NO NEW ENTITIES DETECTED</p>
<p>[16:00:00] POLLING CYCLE 413 START...</p>
<p>[16:00:15] CRITICAL: UNKNOWN SIGNAL ORIGIN IN SECTOR B4</p>
<p class="text-amber-400">[16:00:18] ALERT: GEMINI_BETA ASSIGNED TO SIGNAL DECRYPTION</p>
</div>
</div>
<!-- Database Management -->
<div class="col-span-12 lg:col-span-6 glass-panel p-6 flex flex-col h-[400px]">
<h3 class="font-label-caps text-label-caps text-primary mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-sm">database</span>
                        SUPABASE INTERACTIONS
                    </h3>
<div class="overflow-x-auto">
<table class="w-full text-left font-code-data text-xs">
<thead>
<tr class="border-b border-outline-variant text-on-surface-variant">
<th class="pb-3 font-medium">TIMESTAMP</th>
<th class="pb-3 font-medium">OPERATION</th>
<th class="pb-3 font-medium">ENTITY_ID</th>
<th class="pb-3 font-medium">STATUS</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/30">
<tr class="hover:bg-surface-variant/20 transition-colors">
<td class="py-4">T-12:44:01</td>
<td class="py-4">AUTH_ATTEMPT</td>
<td class="py-4">USR_9921</td>
<td class="py-4 text-primary-fixed">SUCCESS</td>
</tr>
<tr class="hover:bg-surface-variant/20 transition-colors">
<td class="py-4">T-12:45:10</td>
<td class="py-4">DB_WRITE</td>
<td class="py-4">LOG_771A</td>
<td class="py-4 text-primary-fixed">SUCCESS</td>
</tr>
<tr class="hover:bg-surface-variant/20 transition-colors">
<td class="py-4">T-12:46:05</td>
<td class="py-4">REGISTRATION</td>
<td class="py-4">NEW_NODE_01</td>
<td class="py-4 text-amber-400">PENDING</td>
</tr>
<tr class="hover:bg-surface-variant/20 transition-colors">
<td class="py-4">T-12:50:22</td>
<td class="py-4">AUTH_ATTEMPT</td>
<td class="py-4">USR_X411</td>
<td class="py-4 text-error">DENIED</td>
</tr>
<tr class="hover:bg-surface-variant/20 transition-colors">
<td class="py-4">T-13:02:11</td>
<td class="py-4">DB_QUERY</td>
<td class="py-4">GLB_MAP_V2</td>
<td class="py-4 text-primary-fixed">SUCCESS</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
<!-- Footer -->
<footer class="bg-surface-dim border-t border-outline-variant px-margin-desktop py-4 flex justify-between items-center w-full mt-auto">
<div class="font-label-caps text-label-caps text-primary">© 2142 STAR-LINK SYSTEMS | CORE_v4.2.0-STABLE</div>
<div class="flex gap-8 font-code-data text-code-data text-on-surface-variant">
<span class="hover:text-secondary-fixed transition-colors cursor-pointer">SYS_STATUS: OPTIMAL</span>
<span class="hover:text-secondary-fixed transition-colors cursor-pointer">COORD: 42.08.11</span>
<span class="hover:text-secondary-fixed transition-colors cursor-pointer">LATENCY: 14MS</span>
<span class="hover:text-secondary-fixed transition-colors cursor-pointer font-bold text-primary">DEEP_SPACE_PROTOCOLS</span>
</div>
</footer>
<!-- HUD Decorative Elements -->
<div class="fixed top-24 right-8 pointer-events-none opacity-20 hidden xl:block">
<div class="font-code-data text-[10px] text-primary-fixed space-y-1">
<div>X: 44.221.009</div>
<div>Y: -12.441.220</div>
<div>Z: 0.000.001</div>
<div class="w-16 h-[1px] bg-primary-fixed mt-2"></div>
</div>
</div>
</main>
<script>
        // Micro-interaction for logs scrolling or interactive elements
        const logWindow = document.querySelector('.flex-1.bg-surface-container-lowest');
        if (logWindow) {
            setInterval(() => {
                logWindow.scrollTop = logWindow.scrollHeight;
            }, 5000);
        }

        // Simulating live data updates
        setInterval(() => {
            const cpu = document.querySelector('.md\\:grid-cols-3 .glass-panel:nth-child(3) .text-primary-fixed-dim');
            if (cpu) {
                const newVal = Math.floor(40 + Math.random() * 5);
                cpu.textContent = newVal + '%';
            }
        }, 3000);
    </script>
</body></html>