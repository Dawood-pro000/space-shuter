<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Project Vision | Sector Analysis: Pillars of Creation</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700&amp;family=Space+Grotesk:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .glass-panel {
            background: rgba(31, 40, 51, 0.4);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(60, 73, 72, 0.3);
        }
        .laser-border {
            border-top: 2px solid #66FCF1;
            box-shadow: 0 -4px 15px rgba(102, 252, 241, 0.2);
        }
        .scanline {
            width: 100%;
            height: 2px;
            background: rgba(102, 252, 241, 0.3);
            position: absolute;
            top: 0;
            left: 0;
            animation: scan 4s linear infinite;
            z-index: 10;
            pointer-events: none;
        }
        @keyframes scan {
            0% { top: 0; }
            100% { top: 100%; }
        }
        .grid-bg {
            background-image: linear-gradient(rgba(102, 252, 241, 0.05) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(102, 252, 241, 0.05) 1px, transparent 1px);
            background-size: 40px 40px;
        }
        .hud-corner {
            position: absolute;
            width: 10px;
            height: 10px;
            border-color: #66FCF1;
        }
    </style>
</head>
<body class="bg-surface text-on-surface font-body-md selection:bg-primary-fixed/30 overflow-x-hidden">
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
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
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
<!-- TopAppBar -->
<header class="flex justify-between items-center w-full px-margin-desktop h-16 z-50 fixed top-0 bg-surface-container-lowest/40 backdrop-blur-xl border-b border-outline-variant/30">
<div class="flex items-center gap-8">
<span class="font-headline-md text-headline-md text-primary-fixed tracking-widest">PROJECT VISION</span>
<nav class="hidden md:flex gap-6 items-center">
<a class="text-primary-fixed font-bold border-b-2 border-primary-fixed pb-1 font-body-md text-body-md" href="#">Sectors</a>
<a class="text-on-surface-variant hover:text-primary-fixed-dim transition-colors font-body-md text-body-md" href="#">Telemetry</a>
<a class="text-on-surface-variant hover:text-primary-fixed-dim transition-colors font-body-md text-body-md" href="#">Archive</a>
</nav>
</div>
<div class="flex items-center gap-4">
<div class="relative hidden md:block">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]">search</span>
<input class="bg-surface-container-low/40 border-none border-b border-outline-variant/30 focus:border-primary-fixed focus:ring-0 text-code-data font-code-data pl-10 pr-4 py-1 w-64 placeholder:text-outline" placeholder="QUERY COORDINATES..." type="text"/>
</div>
<button class="text-on-surface-variant hover:text-primary-fixed transition-colors">
<span class="material-symbols-outlined">account_circle</span>
</button>
<button class="text-on-surface-variant hover:text-primary-fixed transition-colors">
<span class="material-symbols-outlined">settings</span>
</button>
</div>
</header>
<!-- SideNavBar -->
<aside class="fixed left-0 top-0 h-full w-64 bg-surface-container-low/40 backdrop-blur-xl border-r border-outline-variant/30 flex flex-col py-gutter z-40 hidden md:flex">
<div class="px-6 mb-10 pt-16">
<div class="flex items-center gap-3 mb-4">
<div class="w-10 h-10 bg-secondary-container rounded-sm flex items-center justify-center">
<span class="material-symbols-outlined text-secondary-fixed">shield_person</span>
</div>
<div>
<div class="font-headline-md text-[18px] text-secondary-fixed leading-none">PV-COMMAND</div>
<div class="font-code-data text-[10px] text-outline uppercase tracking-tighter">Terminal Access V2.4</div>
</div>
</div>
</div>
<nav class="flex-1 flex flex-col px-3 gap-1">
<a class="flex items-center gap-4 px-4 py-3 text-on-surface-variant hover:bg-surface-variant/50 hover:text-secondary-fixed transition-colors group" href="#">
<span class="material-symbols-outlined">terminal</span>
<span class="font-label-caps text-label-caps">Command</span>
</a>
<a class="flex items-center gap-4 px-4 py-3 bg-secondary-container/20 text-secondary-fixed border-l-4 border-secondary-fixed group" href="#">
<span class="material-symbols-outlined">radar</span>
<span class="font-label-caps text-label-caps">Sensors</span>
</a>
<a class="flex items-center gap-4 px-4 py-3 text-on-surface-variant hover:bg-surface-variant/50 hover:text-secondary-fixed transition-colors group" href="#">
<span class="material-symbols-outlined">settings_input_antenna</span>
<span class="font-label-caps text-label-caps">Comms</span>
</a>
<a class="flex items-center gap-4 px-4 py-3 text-on-surface-variant hover:bg-surface-variant/50 hover:text-secondary-fixed transition-colors group" href="#">
<span class="material-symbols-outlined">bolt</span>
<span class="font-label-caps text-label-caps">Energy</span>
</a>
<a class="flex items-center gap-4 px-4 py-3 text-on-surface-variant hover:bg-surface-variant/50 hover:text-secondary-fixed transition-colors group" href="#">
<span class="material-symbols-outlined">description</span>
<span class="font-label-caps text-label-caps">Logs</span>
</a>
</nav>
<div class="px-4 mt-auto mb-10">
<button class="w-full py-3 bg-secondary-fixed text-on-secondary-fixed font-label-caps text-label-caps tracking-[0.2em] hover:opacity-90 transition-opacity">
                INITIATE SCAN
            </button>
</div>
<div class="px-3 border-t border-outline-variant/30 pt-4">
<a class="flex items-center gap-4 px-4 py-2 text-on-surface-variant hover:text-secondary-fixed text-[12px] font-code-data" href="#">
<span class="material-symbols-outlined text-[18px]">help</span>
                Support
            </a>
<a class="flex items-center gap-4 px-4 py-2 text-on-surface-variant hover:text-secondary-fixed text-[12px] font-code-data" href="#">
<span class="material-symbols-outlined text-[18px]">logout</span>
                Exit
            </a>
</div>
</aside>
<!-- Main Content -->
<main class="md:ml-64 pt-24 px-margin-mobile md:px-margin-desktop pb-24 grid-bg min-h-screen relative">
<!-- Floating HUD Element -->
<div class="hidden lg:block absolute top-28 right-8 font-code-data text-[10px] text-primary-fixed/40 vertical-rl tracking-widest">
            COORDS: 05h 35m 17s | -05° 23' 28" • STATUS: ARCHIVING
        </div>
<!-- Sector Hero -->
<section class="relative mb-12 overflow-hidden laser-border glass-panel h-[512px] min-h-[400px]">
<div class="scanline"></div>
<div class="absolute inset-0 z-0">
<img class="w-full h-full object-cover opacity-60" data-alt="A cinematic, high-resolution astronomical photograph of the Pillars of Creation nebula. The image showcases towering clouds of interstellar gas and dust in brilliant shades of deep cosmic blue and dark obsidian, illuminated by the fierce light of newborn stars. Wispy, ethereal golden highlights trace the edges of the columns. The aesthetic is scientific yet awe-inspiring, mirroring the high-tech sci-fi interface of a deep-space research console." src="https://lh3.googleusercontent.com/aida-public/AB6AXuD9GEeqfYAH_-rHEK4-xckBS3OAesndH-VCJIXLJIrvmpZfbT0Xs1WIcn-hH0BDRTSdssWzay2ALbRD0AwVKtR1KaAK423twlDVGQjjAdpE5VnNq2w7qmfdXVqA3MQRIErvRNmoObl6NbL2U2KpHDkuv5ITYPCIqD-rdgzMRWknG5kOAd0x2myLmUIGwi7XeL5p1yVqSnQqljHeGzbsrjnk6boQLA8TA-XXTVicRWJVlCC4KozTuz2nb-BeFWiwqZCHrPVZnyJqXlE"/>
</div>
<div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-transparent"></div>
<div class="relative z-10 h-full flex flex-col justify-end p-8 md:p-12">
<div class="mb-4">
<span class="bg-primary-container text-on-primary-container font-label-caps text-[10px] px-3 py-1 mb-4 inline-block">SECTOR ID: M16-EAGLE</span>
<h1 class="font-headline-lg text-headline-lg md:text-[64px] text-primary-fixed uppercase leading-none drop-shadow-[0_0_15px_rgba(98,249,238,0.3)]">Pillars of Creation</h1>
</div>
<div class="flex flex-wrap gap-8 items-center border-t border-outline-variant/30 pt-6">
<div>
<p class="font-label-caps text-label-caps text-outline mb-1">CONSTELLATION</p>
<p class="font-code-data text-body-md text-on-surface">SERPENS NEBULA</p>
</div>
<div>
<p class="font-label-caps text-label-caps text-outline mb-1">DISTANCE</p>
<p class="font-code-data text-body-md text-on-surface">6,500 LIGHT YEARS</p>
</div>
<div>
<p class="font-label-caps text-label-caps text-outline mb-1">DISCOVERY DATE</p>
<p class="font-code-data text-body-md text-on-surface">APRIL 1, 1995</p>
</div>
<div class="ml-auto">
<button class="bg-primary-fixed text-on-primary-fixed font-label-caps text-label-caps px-8 py-4 flex items-center gap-3 group transition-all hover:shadow-[0_0_20px_rgba(102,252,241,0.5)]">
<span class="material-symbols-outlined">download</span>
                            Download Research Paper
                        </button>
</div>
</div>
</div>
<!-- HUD Corners -->
<div class="hud-corner top-4 left-4 border-t-2 border-l-2"></div>
<div class="hud-corner top-4 right-4 border-t-2 border-r-2"></div>
<div class="hud-corner bottom-4 left-4 border-b-2 border-l-2"></div>
<div class="hud-corner bottom-4 right-4 border-b-2 border-r-2"></div>
</section>
<!-- Bento Grid Analysis -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
<!-- Chemical Composition Chart -->
<div class="lg:col-span-8 glass-panel p-6 relative overflow-hidden">
<div class="flex justify-between items-center mb-8">
<h3 class="font-headline-md text-headline-md text-secondary-fixed">SPECTRAL COMPOSITION</h3>
<div class="flex gap-4 font-code-data text-[12px]">
<span class="flex items-center gap-2"><span class="w-2 h-2 bg-primary-fixed"></span> HYDROGEN (H)</span>
<span class="flex items-center gap-2"><span class="w-2 h-2 bg-secondary"></span> OXYGEN (O)</span>
<span class="flex items-center gap-2"><span class="w-2 h-2 bg-tertiary-fixed-dim"></span> CARBON (C)</span>
</div>
</div>
<div class="h-64 flex items-end justify-between gap-4 px-4 border-b border-outline-variant/50 pb-2">
<!-- Placeholder for interactive bars -->
<div class="flex-1 flex flex-col justify-end gap-1">
<div class="bg-primary-fixed/20 border border-primary-fixed w-full transition-all hover:bg-primary-fixed/40" style="height: 85%"></div>
<div class="bg-primary-fixed h-1 w-full"></div>
</div>
<div class="flex-1 flex flex-col justify-end gap-1">
<div class="bg-secondary/20 border border-secondary w-full transition-all hover:bg-secondary/40" style="height: 42%"></div>
<div class="bg-secondary h-1 w-full"></div>
</div>
<div class="flex-1 flex flex-col justify-end gap-1">
<div class="bg-tertiary-fixed-dim/20 border border-tertiary-fixed-dim w-full transition-all hover:bg-tertiary-fixed-dim/40" style="height: 18%"></div>
<div class="bg-tertiary-fixed-dim h-1 w-full"></div>
</div>
<div class="flex-1 flex flex-col justify-end gap-1">
<div class="bg-primary-fixed/20 border border-primary-fixed w-full transition-all hover:bg-primary-fixed/40" style="height: 92%"></div>
<div class="bg-primary-fixed h-1 w-full"></div>
</div>
<div class="flex-1 flex flex-col justify-end gap-1">
<div class="bg-secondary/20 border border-secondary w-full transition-all hover:bg-secondary/40" style="height: 55%"></div>
<div class="bg-secondary h-1 w-full"></div>
</div>
<div class="flex-1 flex flex-col justify-end gap-1">
<div class="bg-tertiary-fixed-dim/20 border border-tertiary-fixed-dim w-full transition-all hover:bg-tertiary-fixed-dim/40" style="height: 31%"></div>
<div class="bg-tertiary-fixed-dim h-1 w-full"></div>
</div>
</div>
<div class="flex justify-between mt-4 font-code-data text-[10px] text-outline px-4 uppercase">
<span>400nm</span>
<span>500nm</span>
<span>600nm</span>
<span>700nm</span>
<span>800nm</span>
<span>900nm</span>
</div>
</div>
<!-- Gemini Parser Log -->
<div class="lg:col-span-4 glass-panel p-6 border-l-2 border-secondary-fixed flex flex-col">
<div class="flex items-center gap-3 mb-6">
<span class="material-symbols-outlined text-secondary-fixed">memory</span>
<h3 class="font-label-caps text-label-caps text-secondary-fixed tracking-widest">GEMINI_PARSER_V2</h3>
</div>
<div class="flex-1 font-code-data text-code-data text-on-surface-variant space-y-4 overflow-y-auto max-h-[300px] pr-2 custom-scrollbar">
<p><span class="text-secondary-fixed">[08:42:11]</span> SYSTEM INITIALIZED. CONNECTING TO ARCHIVE SECTOR M16.</p>
<p><span class="text-secondary-fixed">[08:42:12]</span> ANALYZING SPECTRAL DATA... DETECTION OF MASSIVE COLD GAS CLOUDS CONFIRMED.</p>
<p><span class="text-secondary-fixed">[08:42:15]</span> IONIZATION FRONTS IDENTIFIED AT EDGES. PHOTOEVAPORATION RATE: STABLE.</p>
<p><span class="text-secondary-fixed">[08:42:18]</span> <span class="text-primary-fixed">ALERT:</span> STAR FORMATION DETECTED WITHIN FINGERTIP EVAPORATING GASEOUS GLOBULES (EGGs).</p>
<p><span class="text-secondary-fixed">[08:42:22]</span> CROSS-REFERENCING HUBBLE DATA WITH WEBB INFRARED ARRAYS. CORRELATION 99.8%.</p>
<p><span class="text-secondary-fixed">[08:42:25]</span> DATA PARSING COMPLETE. SECTOR RECORD UPDATED. STATUS: NOMINAL.</p>
</div>
<div class="mt-6 pt-4 border-t border-outline-variant/30 flex items-center justify-between">
<span class="text-[10px] font-code-data text-outline">AUTO-UPDATE: ON</span>
<div class="flex gap-1">
<div class="w-1 h-1 bg-secondary-fixed rounded-full animate-pulse"></div>
<div class="w-1 h-1 bg-secondary-fixed rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
<div class="w-1 h-1 bg-secondary-fixed rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
</div>
</div>
</div>
<!-- Detailed Technical Breakdown -->
<div class="lg:col-span-12 grid grid-cols-1 md:grid-cols-3 gap-gutter">
<div class="glass-panel p-8 relative group">
<div class="font-code-data text-[10px] text-outline absolute top-4 right-4">REF_001</div>
<span class="material-symbols-outlined text-primary-fixed mb-4 text-[32px]">science</span>
<h4 class="font-headline-md text-[18px] text-on-surface mb-3">Nebular Anatomy</h4>
<p class="text-on-surface-variant text-body-md leading-relaxed">
                        The pillars are composed of interstellar hydrogen gas and dust, which act as an incubator for new stars. Inside them and on their surface, astronomers have found knots or globules of even denser gas.
                    </p>
</div>
<div class="glass-panel p-8 relative group">
<div class="font-code-data text-[10px] text-outline absolute top-4 right-4">REF_002</div>
<span class="material-symbols-outlined text-primary-fixed mb-4 text-[32px]">flare</span>
<h4 class="font-headline-md text-[18px] text-on-surface mb-3">Photoevaporation</h4>
<p class="text-on-surface-variant text-body-md leading-relaxed">
                        Intense ultraviolet light from nearby hot stars is heating the gas and causing it to evaporate into space—a process called photoevaporation. This process gives the pillars their ghostly appearance.
                    </p>
</div>
<div class="glass-panel p-8 relative group">
<div class="font-code-data text-[10px] text-outline absolute top-4 right-4">REF_003</div>
<span class="material-symbols-outlined text-primary-fixed mb-4 text-[32px]">auto_awesome</span>
<h4 class="font-headline-md text-[18px] text-on-surface mb-3">Infrared Transparency</h4>
<p class="text-on-surface-variant text-body-md leading-relaxed">
                        In infrared light, the pillars look semi-transparent and much more ethereal. This allows scientists to see past the dust and gas to reveal the thousands of stars that have formed inside.
                    </p>
</div>
</div>
</div>
</main>
<!-- Footer -->
<footer class="md:ml-64 bg-surface-container-lowest/60 border-t border-outline-variant/30 flex justify-between items-center w-full px-margin-mobile md:px-margin-desktop py-4 z-50">
<div class="flex items-center gap-6">
<span class="font-label-caps text-label-caps text-on-surface">DEEP SPACE ARCHIVE</span>
<p class="font-code-data text-code-data text-tertiary-fixed-dim hidden md:block">
                © 2144 DEEP SPACE ARCHIVE. COORDS: 42.00.01. STATUS: NOMINAL.
            </p>
</div>
<div class="flex gap-8">
<a class="font-code-data text-code-data text-outline hover:text-secondary-fixed transition-colors" href="#">Privacy Protocol</a>
<a class="font-code-data text-code-data text-outline hover:text-secondary-fixed transition-colors" href="#">Terms of Service</a>
</div>
</footer>
<script>
        // Simple Micro-interaction: Update coordinates randomly to simulate live data
        setInterval(() => {
            const coords = document.querySelector('.vertical-rl');
            if (coords) {
                const s = Math.floor(Math.random() * 60).toString().padStart(2, '0');
                coords.innerText = coords.innerText.replace(/(\d{2})s/, s + 's');
            }
        }, 3000);

        // Simple Bar Chart Animation Simulation
        const bars = document.querySelectorAll('.flex-1.flex.flex-col .transition-all');
        bars.forEach(bar => {
            bar.addEventListener('mouseenter', () => {
                bar.style.filter = 'brightness(1.5)';
            });
            bar.addEventListener('mouseleave', () => {
                bar.style.filter = 'brightness(1)';
            });
        });
    </script>
</body></html>