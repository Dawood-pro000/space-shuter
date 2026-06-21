<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Project Vision | Deep Space Archive</title>
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
                    "on-primary-container": "#00716b",
                    "tertiary-fixed-dim": "#bec7d6",
                    "tertiary": "#ffffff",
                    "surface-variant": "#333536",
                    "inverse-surface": "#e2e2e3",
                    "secondary-fixed": "#98f2ed",
                    "secondary-container": "#007774",
                    "surface-bright": "#37393a",
                    "on-primary-fixed-variant": "#00504b",
                    "primary": "#ffffff",
                    "surface-container-highest": "#333536",
                    "primary-fixed": "#62f9ee",
                    "on-error": "#690005",
                    "surface-container-lowest": "#0c0f0f",
                    "tertiary-fixed": "#dae3f2",
                    "surface-container-low": "#1a1c1d",
                    "surface-container": "#1e2021",
                    "on-tertiary": "#28313c",
                    "on-secondary-fixed": "#00201f",
                    "inverse-primary": "#006a64",
                    "tertiary-container": "#dae3f2",
                    "on-tertiary-container": "#5c6572",
                    "on-secondary-container": "#a1fcf7",
                    "surface-tint": "#3cdcd1",
                    "secondary": "#7bd6d1",
                    "primary-fixed-dim": "#3cdcd1",
                    "on-primary-fixed": "#00201e",
                    "surface-container-high": "#282a2b",
                    "outline": "#859491",
                    "on-tertiary-fixed": "#131c27",
                    "on-tertiary-fixed-variant": "#3e4753",
                    "on-primary": "#003734",
                    "background": "#111415",
                    "on-secondary": "#003735",
                    "primary-container": "#62f9ee",
                    "on-error-container": "#ffdad6",
                    "secondary-fixed-dim": "#7bd6d1",
                    "inverse-on-surface": "#2e3132",
                    "on-secondary-fixed-variant": "#00504d",
                    "on-background": "#e2e2e3",
                    "error": "#ffb4ab",
                    "outline-variant": "#3c4948",
                    "surface": "#111415",
                    "on-surface-variant": "#bacac7",
                    "on-surface": "#e2e2e3",
                    "error-container": "#93000a",
                    "surface-dim": "#111415"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "spacing": {
                    "gutter": "24px",
                    "grid-cols": "12",
                    "margin-mobile": "16px",
                    "margin-desktop": "64px",
                    "unit": "4px"
            },
            "fontFamily": {
                    "body-md": ["Space Grotesk"],
                    "body-lg": ["Space Grotesk"],
                    "headline-lg": ["Orbitron"],
                    "code-data": ["Space Grotesk"],
                    "label-caps": ["Space Grotesk"],
                    "headline-lg-mobile": ["Orbitron"],
                    "headline-md": ["Orbitron"]
            },
            "fontSize": {
                    "body-md": ["16px", {"lineHeight": "1.5", "fontWeight": "400"}],
                    "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                    "headline-lg": ["48px", {"lineHeight": "1.1", "letterSpacing": "0.05em", "fontWeight": "700"}],
                    "code-data": ["14px", {"lineHeight": "1.4", "letterSpacing": "0.01em", "fontWeight": "500"}],
                    "label-caps": ["12px", {"lineHeight": "1", "letterSpacing": "0.15em", "fontWeight": "700"}],
                    "headline-lg-mobile": ["32px", {"lineHeight": "1.2", "fontWeight": "700"}],
                    "headline-md": ["24px", {"lineHeight": "1.2", "letterSpacing": "0.02em", "fontWeight": "600"}]
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
            border: 1px solid rgba(60, 73, 72, 0.3);
        }
        .laser-border {
            border-top: 2px solid #62f9ee;
            box-shadow: 0 -4px 15px rgba(98, 249, 238, 0.2);
        }
        .scanline {
            width: 100%;
            height: 2px;
            background: rgba(98, 249, 238, 0.1);
            position: absolute;
            top: 0;
            left: 0;
            animation: scan 4s linear infinite;
            z-index: 10;
            pointer-events: none;
        }
        @keyframes scan {
            0% { transform: translateY(0); }
            100% { transform: translateY(100vh); }
        }
        .grid-overlay {
            background-image: 
                linear-gradient(rgba(98, 249, 238, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(98, 249, 238, 0.05) 1px, transparent 1px);
            background-size: 40px 40px;
        }
        .terminal-scroll::-webkit-scrollbar {
            width: 4px;
        }
        .terminal-scroll::-webkit-scrollbar-track {
            background: rgba(12, 15, 15, 1);
        }
        .terminal-scroll::-webkit-scrollbar-thumb {
            background: #45A29E;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="font-body-md text-body-md selection:bg-primary-fixed selection:text-on-primary-fixed">
<!-- Background Layer -->
<div class="fixed inset-0 grid-overlay z-0"></div>
<div class="scanline"></div>
<!-- TopAppBar -->
<header class="fixed top-0 left-0 w-full h-16 z-50 flex justify-between items-center px-margin-desktop bg-surface-container-lowest/40 backdrop-blur-xl border-b border-outline-variant/30">
<div class="flex items-center gap-4">
<span class="font-headline-md text-headline-md text-primary-fixed tracking-widest">PROJECT VISION</span>
</div>
<div class="flex-1 max-w-xl px-12">
<div class="relative group">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">search</span>
<input class="w-full bg-surface-container-low border-b border-outline-variant/30 focus:border-primary-fixed outline-none px-10 py-2 font-code-data text-code-data transition-all group-hover:bg-surface-variant/20" placeholder="QUERY ARCHIVE..." type="text"/>
<span class="absolute right-3 top-1/2 -translate-y-1/2 font-code-data text-[10px] text-outline">CMD+K</span>
</div>
</div>
<nav class="hidden md:flex items-center gap-8">
<a class="text-on-surface-variant hover:text-primary-fixed-dim transition-colors font-body-md text-body-md" href="#">Sectors</a>
<a class="text-on-surface-variant hover:text-primary-fixed-dim transition-colors font-body-md text-body-md" href="#">Telemetry</a>
<a class="text-primary-fixed font-bold border-b-2 border-primary-fixed pb-1 font-body-md text-body-md" href="#">Archive</a>
<div class="flex items-center gap-4 ml-4">
<span class="material-symbols-outlined text-on-surface-variant hover:text-primary-fixed cursor-pointer">account_circle</span>
<span class="material-symbols-outlined text-on-surface-variant hover:text-primary-fixed cursor-pointer">settings</span>
</div>
</nav>
</header>
<!-- Sidebar & Main Content Wrapper -->
<div class="flex pt-16 min-h-screen">
<!-- SideNavBar -->
<aside class="fixed left-0 top-16 h-[calc(100vh-64px)] w-64 bg-surface-container-low/40 backdrop-blur-xl border-r border-outline-variant/30 z-40 hidden md:flex flex-col py-gutter">
<div class="px-6 mb-8">
<div class="flex items-center gap-3 mb-4">
<div class="w-10 h-10 bg-secondary-container/20 border border-secondary-fixed flex items-center justify-center">
<span class="material-symbols-outlined text-secondary-fixed">shield_person</span>
</div>
<div>
<div class="font-label-caps text-label-caps text-secondary-fixed uppercase tracking-wider">Commander</div>
<div class="font-code-data text-[10px] text-outline">AUTH: LEVEL 07</div>
</div>
</div>
<button class="w-full py-3 bg-secondary-fixed text-on-secondary-fixed font-label-caps text-label-caps tracking-widest hover:brightness-110 active:scale-[0.98] transition-all">
                    INITIATE SCAN
                </button>
</div>
<nav class="flex-1 flex flex-col gap-1 px-2">
<div class="px-4 py-2 font-label-caps text-[10px] text-outline mb-2">SYSTEM MODULES</div>
<a class="flex items-center gap-4 px-4 py-3 text-on-surface-variant hover:bg-surface-variant/50 hover:text-secondary-fixed transition-colors font-label-caps text-label-caps" href="#">
<span class="material-symbols-outlined">terminal</span> COMMAND
                </a>
<a class="flex items-center gap-4 px-4 py-3 text-on-surface-variant hover:bg-surface-variant/50 hover:text-secondary-fixed transition-colors font-label-caps text-label-caps" href="#">
<span class="material-symbols-outlined">radar</span> SENSORS
                </a>
<a class="flex items-center gap-4 px-4 py-3 text-on-surface-variant hover:bg-surface-variant/50 hover:text-secondary-fixed transition-colors font-label-caps text-label-caps" href="#">
<span class="material-symbols-outlined">settings_input_antenna</span> COMMS
                </a>
<a class="flex items-center gap-4 px-4 py-3 text-on-surface-variant hover:bg-surface-variant/50 hover:text-secondary-fixed transition-colors font-label-caps text-label-caps" href="#">
<span class="material-symbols-outlined">bolt</span> ENERGY
                </a>
<a class="flex items-center gap-4 px-4 py-3 bg-secondary-container/20 text-secondary-fixed border-l-4 border-secondary-fixed font-label-caps text-label-caps" href="#">
<span class="material-symbols-outlined">description</span> LOGS
                </a>
</nav>
<div class="px-2 mt-auto border-t border-outline-variant/10 pt-4">
<a class="flex items-center gap-4 px-4 py-2 text-on-surface-variant hover:text-secondary-fixed font-label-caps text-label-caps" href="#">
<span class="material-symbols-outlined text-[18px]">help</span> SUPPORT
                </a>
<a class="flex items-center gap-4 px-4 py-2 text-on-surface-variant hover:text-secondary-fixed font-label-caps text-label-caps" href="#">
<span class="material-symbols-outlined text-[18px]">logout</span> EXIT
                </a>
</div>
</aside>
<!-- Archive Content Area -->
<main class="flex-1 md:ml-64 px-margin-mobile md:px-margin-desktop py-gutter z-10">
<!-- Filters & Header Row -->
<div class="flex flex-col md:flex-row justify-between items-end gap-6 mb-12 border-b border-outline-variant/30 pb-6">
<div>
<h1 class="font-headline-lg text-headline-lg text-primary-fixed mb-2">DEEP SPACE ARCHIVE</h1>
<div class="font-code-data text-code-data text-outline flex items-center gap-4">
<span class="flex items-center gap-1"><span class="w-2 h-2 bg-primary-fixed animate-pulse"></span> SYSTEM: NOMINAL</span>
<span>|</span>
<span>RECORDS: 1,402,391</span>
<span>|</span>
<span class="text-secondary-fixed">STARDATE: 2144.082.11</span>
</div>
</div>
<div class="flex gap-4 w-full md:w-auto">
<select class="bg-surface-container-low border border-outline-variant/30 text-on-surface-variant font-code-data text-code-data px-4 py-2 focus:border-secondary-fixed outline-none">
<option>STAR SYSTEM: ALL</option>
<option>ANDROMEDA</option>
<option>SOL</option>
<option>KEPLER-186</option>
</select>
<select class="bg-surface-container-low border border-outline-variant/30 text-on-surface-variant font-code-data text-code-data px-4 py-2 focus:border-secondary-fixed outline-none">
<option>TYPE: ANOMALY</option>
<option>DATA LOG</option>
<option>RESEARCH PAPER</option>
</select>
</div>
</div>
<!-- Bento Archive Grid -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
<!-- Large Featured Entry -->
<div class="md:col-span-8 group relative overflow-hidden glass-panel laser-border p-6 transition-all hover:bg-surface-container-low/60">
<div class="absolute top-2 right-2 font-code-data text-[10px] text-outline">REF: ARCH-001 / CR-92.4</div>
<div class="flex flex-col md:flex-row gap-6 h-full">
<div class="w-full md:w-1/2 h-64 md:h-auto overflow-hidden relative">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="A hyper-realistic deep space phenomenon featuring a swirling blue and violet nebula collapsing into a singularity. Sharp crystalline formations float in the foreground, illuminated by intense turquoise light. The image has a scientific, high-contrast aesthetic with visible gravitational lensing effects and cosmic dust particles catching the light." src="https://lh3.googleusercontent.com/aida-public/AB6AXuChTDUcJlVZAgcVto180gF6oDIea7GaP2OP3KvBfVip_HHJJ7F2krFJGe45SrVctM8Akm4xHvDSzkR-vcBZsC9dk1yMx-v2x7z14XjdRyRGkwMfEZ9MJ8DZHIAnka2iaTvq8vz1_fxKIuf_jxC7_01F4TPRor5QggmUJHDk0-A1T2QatEYOCPiK__s1OrSUSIwvW_FWYLycbNcWEEekbN-4_nJdZjFu8WGmL2bIdQNnCxqKLYnrYgdu1rAR8NbziG54cVf8jdBeeWY"/>
<div class="absolute inset-0 bg-gradient-to-t from-background/80 to-transparent"></div>
<div class="absolute bottom-4 left-4">
<span class="bg-primary-fixed/20 text-primary-fixed border border-primary-fixed text-[10px] px-2 py-1 font-label-caps">HIGH PRIORITY</span>
</div>
</div>
<div class="w-full md:w-1/2 flex flex-col justify-center">
<h2 class="font-headline-md text-headline-md text-primary-fixed mb-4 group-hover:text-secondary-fixed transition-colors">QUANTUM FLUCTUATION IN SECTOR 4</h2>
<p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-4">
                                Detected anomalous temporal distortions near the event horizon of Sag-A*. Gemini Analysis indicates a 94.2% probability of non-linear causality loops. Data extraction reveals encoded signals within the neutrino stream.
                            </p>
<div class="mt-auto flex justify-between items-center border-t border-outline-variant/30 pt-4">
<span class="font-code-data text-code-data text-outline">LAST UPDATED: 2144.079.01</span>
<button class="flex items-center gap-2 text-secondary-fixed hover:underline font-label-caps text-label-caps">DECRYPT <span class="material-symbols-outlined text-sm">arrow_forward</span></button>
</div>
</div>
</div>
</div>
<!-- Side Data Card -->
<div class="md:col-span-4 glass-panel p-6 relative overflow-hidden flex flex-col">
<div class="absolute top-0 left-0 w-full h-1 bg-secondary-fixed/30"></div>
<div class="absolute top-2 right-2 font-code-data text-[10px] text-outline">REF: LOG-442</div>
<span class="material-symbols-outlined text-secondary-fixed mb-4" style="font-variation-settings: 'FILL' 1;">radar</span>
<h3 class="font-headline-md text-headline-md text-on-surface mb-2">NEBULA M7-X</h3>
<p class="font-code-data text-code-data text-on-surface-variant mb-4">Radiographic analysis confirms heavy element synthesis in the outer shell. Atmospheric composition consists of 40% Argon, 12% Xenon.</p>
<div class="space-y-2 mt-auto">
<div class="flex justify-between text-[11px] font-code-data border-b border-outline-variant/10 pb-1">
<span class="text-outline">DENSITY</span>
<span class="text-primary-fixed">0.0042 ρ</span>
</div>
<div class="flex justify-between text-[11px] font-code-data border-b border-outline-variant/10 pb-1">
<span class="text-outline">TEMP</span>
<span class="text-primary-fixed">-270.4°C</span>
</div>
<div class="flex justify-between text-[11px] font-code-data border-b border-outline-variant/10 pb-1">
<span class="text-outline">RADIATION</span>
<span class="text-error">CRITICAL</span>
</div>
</div>
</div>
<!-- Regular List Entries -->
<div class="md:col-span-6 glass-panel group p-4 border-l-4 border-l-outline-variant hover:border-l-primary-fixed transition-all cursor-pointer">
<div class="flex gap-4">
<div class="w-24 h-24 shrink-0 bg-surface-container">
<img class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all" data-alt="Microscopic view of interstellar dark matter filaments interacting with high-energy photons. Cold blue tones, sharp digital grain, and glowing neural-like networks against the black void. Atmospheric sci-fi laboratory aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBPP1hyanemjcF3DMNpNkiL-u194bWP5h93RB9m-94cdhWjeeoA-bj3qYeCXOuTp4VgNRQPC49kNgMRhF915nj8YhNp0QhBjAoZb-xmuhI_QYHVTjzV48MOlz-yoSUh47JGJm6qiPA5tpwblkIox1ciR2wbo4oeSdIfTcypXNMhvx-bVLt7umG6jXlS00ChNTDxUQGTJfhGcWL1imRjpnHAcu7zWlFNA_InK_RBQzbtVkLGE8x4i51RHVBGUfaHasG7K4E8JZEdm-I"/>
</div>
<div class="flex-1">
<div class="flex justify-between items-start mb-1">
<h4 class="font-headline-md text-[18px] text-on-surface group-hover:text-primary-fixed transition-colors">DARK MATTER VOID ANALYSIS</h4>
<span class="font-code-data text-[10px] text-outline">2144.062</span>
</div>
<p class="text-code-data text-on-surface-variant line-clamp-2">Synthetic aperture mapping of the Boötes void reveals unprecedented structure in non-baryonic matter.</p>
</div>
</div>
</div>
<div class="md:col-span-6 glass-panel group p-4 border-l-4 border-l-outline-variant hover:border-l-primary-fixed transition-all cursor-pointer">
<div class="flex gap-4">
<div class="w-24 h-24 shrink-0 bg-surface-container">
<img class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all" data-alt="A massive orbital research station casting a silhouette against a bright orange gas giant. Intricate technical detail on the hull, glowing red hangar lights, and realistic shadows. The style is industrial, high-tech, and futuristic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCffpHI4t5W1iybjLnjfBWsBa8CzIe8AmDrPKOJwT0AeJlFU_heSQj9UxglPdoHzgIzRx2qVjO-R2eCUHkbE4OZ_46tRIWEt7Tw96ct56_LyGsO8OaLb1HIjc2cLoy_6m_-i3FIwrdXRkkGKirBhwxN94Hu5AKCpJlPRHfLP7_KWMGM0RgRgIqfsqy5w1oV8qit8lZDN0LsnVh1G3G6cdrq3X6df2PPsvxMR9PaDLWXYJs3_yVjONNTDjgBk_gtUSYHmmoC9jnRPMM"/>
</div>
<div class="flex-1">
<div class="flex justify-between items-start mb-1">
<h4 class="font-headline-md text-[18px] text-on-surface group-hover:text-primary-fixed transition-colors">ORBITAL STATION LOG: V8</h4>
<span class="font-code-data text-[10px] text-outline">2144.058</span>
</div>
<p class="text-code-data text-on-surface-variant line-clamp-2">Weekly maintenance log for Sector-V. Life support stable. Gravity generator recalibration required in Ring 4.</p>
</div>
</div>
</div>
<div class="md:col-span-4 glass-panel p-6 border-b-2 border-outline-variant group">
<div class="font-label-caps text-[10px] text-secondary-fixed mb-4">TELEMETRY_FEED.EXE</div>
<div class="h-32 w-full mb-4 relative flex items-end gap-1">
<div class="bg-primary-fixed/40 flex-1 transition-all group-hover:bg-primary-fixed h-12"></div>
<div class="bg-primary-fixed/40 flex-1 transition-all group-hover:bg-primary-fixed h-24"></div>
<div class="bg-primary-fixed/40 flex-1 transition-all group-hover:bg-primary-fixed h-16"></div>
<div class="bg-primary-fixed/40 flex-1 transition-all group-hover:bg-primary-fixed h-32"></div>
<div class="bg-primary-fixed/40 flex-1 transition-all group-hover:bg-primary-fixed h-20"></div>
<div class="bg-primary-fixed/40 flex-1 transition-all group-hover:bg-primary-fixed h-28"></div>
<div class="bg-primary-fixed/40 flex-1 transition-all group-hover:bg-primary-fixed h-14"></div>
</div>
<h4 class="font-code-data text-code-data text-on-surface mb-2">SIGNAL FREQUENCY DELTA-9</h4>
<p class="text-[12px] text-outline">Continuous narrowband emission originating from the Sirius system. Possible artificial source identified.</p>
</div>
<div class="md:col-span-8 glass-panel overflow-hidden group">
<div class="flex h-full">
<div class="flex-1 p-6">
<div class="font-label-caps text-label-caps text-error mb-2 tracking-widest">CRITICAL ANOMALY</div>
<h3 class="font-headline-md text-headline-md text-on-surface mb-2">PULSAR PULSE SYNCHRONIZATION</h3>
<p class="font-body-md text-body-md text-on-surface-variant mb-6">Observation of three disparate pulsars synchronizing their rotation periods across 14 light years. Statistical impossibility suggests external manipulation.</p>
<button class="px-6 py-2 border border-primary-fixed text-primary-fixed font-label-caps text-label-caps hover:bg-primary-fixed hover:text-on-primary transition-all">ACCESS FULL REPORT</button>
</div>
<div class="hidden md:block w-1/3 bg-surface-container relative">
<img class="w-full h-full object-cover" data-alt="A stylized digital representation of three pulsars with glowing beams of light intersecting in space. Geometric wireframe patterns and coordinate data overlays are floating in the black void. High-tech HUD aesthetic with cyan and magenta accents." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBKsig3F-_DTXGeIRM353AJsbm-VP2nrjJnxbmw5R4c8UdiW04lr71JQvT_Y4bKIxQCDfmWafyUVIlpGmPcei8vuZev3UnG6hGcoY_0DPDGibIuwgn_lNpasZnMwlMiC3wsTFWa2fp3r-k83e85NxqcL_dcwRYgWL1Lvg_iA81up0mKWw0qD6pGntZyvKKddNyQEDJbWGS9anQxpqABebxeMAM3ebAJLld830QLC7tg3LOFYMeJHEg64Up0ZzntcKzUHcsFtuefzXQ"/>
<div class="absolute inset-0 bg-primary-fixed/10 mix-blend-overlay"></div>
</div>
</div>
</div>
</div>
</main>
</div>
<!-- Footer -->
<footer class="relative mt-12 bg-surface-container-lowest/60 border-t border-outline-variant/30 py-4 px-margin-desktop z-50 flex justify-between items-center">
<div class="font-code-data text-code-data text-tertiary-fixed-dim">
            © 2144 DEEP SPACE ARCHIVE. COORDS: 42.00.01. STATUS: <span class="text-primary-fixed">NOMINAL</span>.
        </div>
<div class="flex gap-8">
<a class="font-code-data text-code-data text-outline hover:text-secondary-fixed transition-colors" href="#">Privacy Protocol</a>
<a class="font-code-data text-code-data text-outline hover:text-secondary-fixed transition-colors" href="#">Terms of Service</a>
</div>
<div class="font-label-caps text-label-caps text-on-surface">
            VISION_OS V2.4
        </div>
</footer>
<script>
        // Micro-interactions for terminal feel
        document.addEventListener('keydown', (e) => {
            if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
                e.preventDefault();
                document.querySelector('input').focus();
            }
        });

        // Hover sound effect simulation (visual)
        const cards = document.querySelectorAll('.glass-panel');
        cards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                // Potential for adding actual SFX here
            });
        });
    </script>
</body></html>