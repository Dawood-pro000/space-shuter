<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>THERMAL ANOMALY ANALYSIS: NEBULA V39-DELTA | Project Vision</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;800&amp;family=Space+Grotesk:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
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
    </style>
</head>
<body class="antialiased font-body-md text-body-md overflow-x-hidden">
<!-- HUD BACKGROUND OVERLAY -->
<div class="fixed inset-0 pointer-events-none opacity-20 z-0">
<div class="absolute top-8 left-8 font-code-data text-code-data text-primary-fixed">COORD: 42.00.01 // DEEP_ARCHIVE</div>
<div class="absolute bottom-8 right-8 font-code-data text-code-data text-primary-fixed">SECURE_CHANNEL_V2.4</div>
<div class="w-full h-full border border-outline-variant/10 m-4"></div>
</div>
<!-- Top Navigation Bar -->
<header class="flex justify-between items-center w-full px-margin-desktop h-16 z-50 bg-surface-container-lowest/40 backdrop-blur-xl border-b border-outline-variant/30 fixed top-0 left-0">
<div class="font-headline-md text-headline-md text-primary-fixed tracking-widest uppercase">Project Vision</div>
<nav class="hidden md:flex items-center gap-8">
<a class="text-on-surface-variant hover:text-primary-fixed-dim transition-colors font-body-md text-body-md" href="#">Sectors</a>
<a class="text-on-surface-variant hover:text-primary-fixed-dim transition-colors font-body-md text-body-md" href="#">Telemetry</a>
<a class="text-primary-fixed font-bold border-b-2 border-primary-fixed pb-1 font-body-md text-body-md" href="#">Archive</a>
</nav>
<div class="flex items-center gap-6">
<span class="material-symbols-outlined text-primary-fixed cursor-pointer">account_circle</span>
<span class="material-symbols-outlined text-primary-fixed cursor-pointer">settings</span>
</div>
</header>
<!-- Side Navigation Bar -->
<aside class="hidden lg:flex flex-col h-full py-gutter z-40 fixed left-0 top-0 w-64 bg-surface-container-low/40 backdrop-blur-xl border-r border-outline-variant/30 pt-20">
<div class="px-6 mb-10">
<div class="font-label-caps text-label-caps text-secondary-fixed mb-1 uppercase">Terminal Access V2.4</div>
<div class="font-headline-md text-headline-md text-secondary-fixed uppercase">Database</div>
</div>
<nav class="flex-grow flex flex-col gap-1 px-4">
<button class="flex items-center gap-4 px-4 py-3 rounded-none text-on-surface-variant hover:bg-surface-variant/50 hover:text-secondary-fixed transition-all group">
<span class="material-symbols-outlined group-hover:scale-110">terminal</span>
<span class="font-label-caps text-label-caps">Command</span>
</button>
<button class="flex items-center gap-4 px-4 py-3 rounded-none bg-secondary-container/20 text-secondary-fixed border-l-4 border-secondary-fixed transition-transform duration-150 scale-[0.98]">
<span class="material-symbols-outlined">radar</span>
<span class="font-label-caps text-label-caps">Sensors</span>
</button>
<button class="flex items-center gap-4 px-4 py-3 rounded-none text-on-surface-variant hover:bg-surface-variant/50 hover:text-secondary-fixed transition-all group">
<span class="material-symbols-outlined group-hover:scale-110">settings_input_antenna</span>
<span class="font-label-caps text-label-caps">Comms</span>
</button>
<button class="flex items-center gap-4 px-4 py-3 rounded-none text-on-surface-variant hover:bg-surface-variant/50 hover:text-secondary-fixed transition-all group">
<span class="material-symbols-outlined group-hover:scale-110">bolt</span>
<span class="font-label-caps text-label-caps">Energy</span>
</button>
<button class="flex items-center gap-4 px-4 py-3 rounded-none text-on-surface-variant hover:bg-surface-variant/50 hover:text-secondary-fixed transition-all group">
<span class="material-symbols-outlined group-hover:scale-110">description</span>
<span class="font-label-caps text-label-caps">Logs</span>
</button>
</nav>
<div class="px-4 mt-auto">
<button class="w-full py-4 bg-primary-container text-on-primary-fixed font-bold tracking-widest text-label-caps laser-glow hover:opacity-90 transition-all">INITIATE SCAN</button>
</div>
</aside>
<!-- Main Content Area -->
<main class="lg:pl-64 pt-16 min-h-screen relative z-10">
<!-- Hero Header Image -->
<section class="relative h-[512px] w-full overflow-hidden">
<div class="absolute inset-0 bg-gradient-to-t from-[#0b0c10] via-transparent to-transparent z-20"></div>
<div class="absolute inset-0 z-10" data-alt="A cinematic, wide-angle cosmic vista of a massive, glowing purple and magenta nebula deep in space. The gas clouds are dense and bioluminescent, swirling around a bright stellar core that casts long, dramatic shadows. Small, sharp stars twinkle in the distance, and the entire scene is rendered in high-definition with a moody, dark atmosphere consistent with a technical space exploration interface." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAEElsUor8uESiO0M0uw4CFsxchqAM215TlFVw6ar4tubEEPNUwlUS0M0qCgj4ThbHw-CStngKlfm8AyYJatPUKliJqV9myvBsz8bmXjzaRTy1sf4j7GAyRkYc7ZA9G2uQDKKxa_MbdA-wX0DJ-j3lKhvJdWIA4qBhNZKkqgMOCv-ii_psYnC4SZhY1GQjnBuxSPmpoay8q9Z5mLfkBlX-4fnODrOpeoAxS6D9SbnZRJCT0F0tUAEwlbfXoVOld_GGDi9WCq_aBgEU')"></div>
<div class="absolute bottom-12 left-margin-desktop z-30 max-w-4xl">
<div class="font-code-data text-code-data text-primary-fixed mb-2 tracking-[0.3em] uppercase">SYSTEM.RESEARCH_ARCHIVE // ID: 88-ALPHA</div>
<h1 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-white uppercase leading-none">THERMAL ANOMALY ANALYSIS: NEBULA V39-DELTA</h1>
</div>
</section>
<!-- Article Content Layout -->
<section class="px-margin-desktop py-12 grid grid-cols-12 gap-12">
<!-- Left Sidebar (Technical Metadata) -->
<div class="hidden xl:col-span-1 xl:flex flex-col gap-8">
<div class="border-l border-primary-fixed pl-4">
<span class="font-code-data text-[10px] text-primary-fixed block uppercase">Classification</span>
<span class="font-label-caps text-label-caps text-white">LEVEL-5</span>
</div>
<div class="border-l border-outline-variant pl-4">
<span class="font-code-data text-[10px] text-outline block uppercase">Priority</span>
<span class="font-label-caps text-label-caps text-white">CRITICAL</span>
</div>
<div class="border-l border-outline-variant pl-4">
<span class="font-code-data text-[10px] text-outline block uppercase">Sensor State</span>
<span class="font-label-caps text-label-caps text-secondary-fixed">ACTIVE</span>
</div>
</div>
<!-- Main Text Column -->
<div class="col-span-12 xl:col-span-8 space-y-16">
<!-- Abstract -->
<div class="glass-panel p-8 relative overflow-hidden">
<div class="scanline"></div>
<div class="flex items-center gap-2 mb-6">
<span class="w-2 h-2 bg-primary-fixed rounded-full animate-pulse"></span>
<h2 class="font-headline-md text-headline-md text-white uppercase tracking-wider">Abstract</h2>
</div>
<p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed mb-6">
                        V39-Delta presents a thermal profile that defies standard cosmological models for post-supernova dissipation. Our deep-field arrays have detected localized temperature spikes exceeding 2.4 million Kelvin, localized within the interior filaments of the nebula. This report details the telemetry captured by the Project Vision Gemini Array between cycles 4022.01 and 4022.09.
                    </p>
<div class="grid grid-cols-3 gap-4 border-t border-outline-variant/30 pt-6">
<div>
<div class="font-code-data text-xs text-outline uppercase">Peak Intensity</div>
<div class="font-label-caps text-lg text-primary-fixed">9.441 PW</div>
</div>
<div>
<div class="font-code-data text-xs text-outline uppercase">Decay Rate</div>
<div class="font-label-caps text-lg text-secondary-fixed">0.02%/CYCLE</div>
</div>
<div>
<div class="font-code-data text-xs text-outline uppercase">Flux Variance</div>
<div class="font-label-caps text-lg text-white">NOMINAL</div>
</div>
</div>
</div>
<!-- Observed Phenomena -->
<div class="space-y-6">
<h2 class="font-headline-md text-headline-md text-white uppercase tracking-wider border-b border-primary-fixed w-max pr-12 pb-2">Observed Phenomena</h2>
<p class="font-body-md text-body-md text-on-surface-variant">
                        The primary phenomenon observed is the "Crystalline Flare" effect. Unlike standard gaseous ignition, the Nebula V39-Delta exhibits a rigid structural lattice within its high-temperature zones. Sensors indicate a geometry that mimics silicon-based neural pathways on a macro-galactic scale.
                    </p>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="relative aspect-video glass-panel overflow-hidden">
<div class="w-full h-full bg-cover bg-center" data-alt="A detailed scientific visualization of a thermal heat map showing intense spikes in purple and cyan colors. The image looks like a digital sensor readout with grid lines, numerical coordinate overlays, and glowing hotspots indicating extreme temperature variances within a cosmic gas cloud." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAUSZTtoh5bNmGcYFnONLuikBA4ZzNP2de0H0QGpmnJfwayyWL1pHMl9C7Xk-NHbIQ2lTIaOLS5DezUDiNbf9gH5uW_z_s9jrFyoJmeJ1aHSpwllPow4JebV4JBgIov8uoUPLeyDjDzrgOVgABFYSLao7DboE_r3shYagU0o-A0Xl8vH-wB-bLId4vkFAg0mwne7VlL_GDLJtU6JeExNZekBdFUF7CibWwXCbXm_niyoP96D5Qg1CEZljHCLbPC5bo-yCVXjcC71WU')"></div>
<div class="absolute top-2 right-2 font-code-data text-[10px] bg-surface-container-lowest/80 px-2 py-1 text-primary-fixed">FIG_001: THERMAL_MAP</div>
</div>
<div class="relative aspect-video glass-panel overflow-hidden">
<div class="w-full h-full bg-cover bg-center" data-alt="A macro-photography style digital rendering of a crystalline structure forming within a purple gaseous medium. The crystals are sharp, geometric, and translucent, glowing with internal cyan energy. The lighting is harsh and directional, creating high contrast against the dark space background." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDC17xid4L1GAJYLhesp-jtwiqC2wXITIGIkI11fsP0fJAFzkA4DTBQOUSQxi59066Tad4rb-5pK41ceTqrq0oFNrWphnzbOtOGWES481TLTokNrrSOqiobioOh3B3ixb61Ki5Rtm-o7a3r6eXR7ysf2CMOCWWwfRVNXAM010b6xbCxV-31njI-YriWd_dEbwq6WHHv6QoQeAT7Ux2UkuUQt9z6aZRxkbZ6K3bWoiINg8qolD41gf731d4fkKvma2-fC2tYYODwHnk')"></div>
<div class="absolute top-2 right-2 font-code-data text-[10px] bg-surface-container-lowest/80 px-2 py-1 text-primary-fixed">FIG_002: LATTICE_STRUCT</div>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant italic">
                        Initial hypothesis suggests a Type III civilization energy harvesting byproduct, though local chronometers show no sign of heavy-element enrichment typically associated with artificial Dyson structures.
                    </p>
</div>
<!-- Gemini Analysis -->
<div class="bg-secondary-container/10 border-l-4 border-secondary-fixed p-8">
<div class="flex items-center gap-3 mb-4">
<span class="material-symbols-outlined text-secondary-fixed">psychology_alt</span>
<h2 class="font-headline-md text-headline-md text-secondary-fixed uppercase">Gemini Analysis</h2>
</div>
<div class="font-code-data text-body-md text-secondary-fixed-dim bg-black/40 p-4 rounded-none border border-outline-variant/20 mb-4">
                        [LOG START] // PROCESSING V39_DELTA_RAW_DATA...<br/>
                        HEURISTIC OVERLAP DETECTED: 84.3% MATCH WITH ANOMALY 'OMEGA-7'.<br/>
                        RECOMMENDED ACTION: DEPLOY SHORT-RANGE PROBE TO COORD [882.11, -29.4].<br/>
                        THERMAL RADIATION HAZARD: EXTREME.
                    </div>
<p class="font-body-md text-body-md text-on-surface-variant">
                        The Gemini core concludes that the anomaly is not a passive remnant but an active energetic event. The pulsing frequency of the thermal spikes corresponds exactly to the prime number sequence 2, 3, 5, 7, 11... suggesting an intentional transmission or a rhythmic biological process.
                    </p>
</div>
<!-- Safety Protocols -->
<div class="border border-error/30 p-8 relative">
<div class="absolute top-0 right-0 p-2 bg-error text-on-error font-label-caps text-[10px]">CRITICAL SAFETY WARNING</div>
<h2 class="font-headline-md text-headline-md text-error uppercase mb-6 flex items-center gap-2">
<span class="material-symbols-outlined">warning</span> Safety Protocols
                    </h2>
<ul class="space-y-4">
<li class="flex gap-4 items-start">
<span class="font-code-data text-error">001</span>
<span class="text-on-surface-variant font-body-md">Maintain a minimum engagement distance of 4.2 Light Years. Direct visual observation via standard optic arrays is prohibited due to photic overload risks.</span>
</li>
<li class="flex gap-4 items-start">
<span class="font-code-data text-error">002</span>
<span class="text-on-surface-variant font-body-md">Ensure all AI cores are isolated behind Level-2 firewalls during data intake to prevent synaptic bleaching via anomalous data patterns.</span>
</li>
<li class="flex gap-4 items-start">
<span class="font-code-data text-error">003</span>
<span class="text-on-surface-variant font-body-md">Any ship-bound personnel experiencing 'echo-hallucinations' or rhythmic auditory signals must report to Med-Bay immediately for neural decoupling.</span>
</li>
</ul>
</div>
</div>
<!-- Right Sidebar (Related & Actions) -->
<div class="col-span-12 xl:col-span-3 space-y-10">
<!-- Action Cards -->
<div class="space-y-4">
<button class="w-full h-16 glass-panel border-primary-fixed border-2 flex items-center justify-center gap-4 group hover:bg-primary-fixed hover:text-black transition-all duration-300">
<span class="material-symbols-outlined group-hover:scale-125 transition-transform">download</span>
<span class="font-label-caps text-label-caps font-bold">EXPORT TELEMETRY</span>
</button>
<button class="w-full h-12 glass-panel border border-outline-variant/50 flex items-center justify-center gap-3 hover:bg-surface-variant/50 transition-colors">
<span class="material-symbols-outlined text-sm">share</span>
<span class="font-label-caps text-[10px]">TRANSMIT TO COMMAND</span>
</button>
</div>
<!-- Related Discoveries -->
<div class="space-y-6">
<h3 class="font-headline-md text-[18px] text-white uppercase tracking-widest border-b border-outline-variant pb-2">Related Discoveries</h3>
<div class="group cursor-pointer">
<div class="flex gap-4 items-center">
<div class="w-16 h-16 glass-panel overflow-hidden shrink-0">
<div class="w-full h-full bg-cover bg-center" data-alt="A stylized digital icon or thumbnail representing an icy planetary system, colored in deep blues and frosty whites, with scientific data markers overlayed." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuC-q74AE-O0I2TnsBRKYU9WjH_hbBB3gFOsna6K8MjH6CCUjBDvSevwJKjo6RZf_NKZtj-F80qGnU49oGf7dQfw7TfRjcE3Trc0B--_fhe1Sr23wWPIT9DQ1a9i4M-cnweDbaMEcXhWGI19Sq8Y7NzMCsjiP-8SS8o1cuBF2QYkNQgkX8i8rZQni22f37G9V0aEKZQgtbmc-4je1085mXR8BDcWJZQyy2XlYX549MDrKbeXK_9ZiFG5XDv2Q1ng0PYMfjbG7kfjxfs')"></div>
</div>
<div>
<h4 class="font-label-caps text-xs text-primary-fixed group-hover:underline">FROZEN STAR-ID: X99</h4>
<p class="text-[11px] text-outline font-code-data mt-1">Thermal profile match: 72%</p>
</div>
</div>
</div>
<div class="group cursor-pointer">
<div class="flex gap-4 items-center">
<div class="w-16 h-16 glass-panel overflow-hidden shrink-0">
<div class="w-full h-full bg-cover bg-center" data-alt="A detailed star map chart with intricate white lines on a black background, showing constellations and orbital paths in a futuristic technical style." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDZgphQlGnSip4pfxFOgWL7vLBuG_i4h_GESWQ5E_FJuhiyhJ1atKT4TjOKk5AKHrtz2_q75pOgnpNHOjPtCtmiQdgRBA97Au3kPpZj6Ku5rQvehnJP41ZS8TZ5Nqsvy2d_qkkyOBqK068SmxOLYlolLm2Wm0KI-Kli-Kbdda0vFmFphdrLup9p8eYq-jRV0szOPF8yYHqKxArskJRf3VDEZ16AtUYXFAk9lEv45ScqEO2I0yd2O8E4VrcpiqG1tVgJqqJmRNAgmkM')"></div>
</div>
<div>
<h4 class="font-label-caps text-xs text-primary-fixed group-hover:underline">ORBITAL DRIFT: SECTOR 4</h4>
<p class="text-[11px] text-outline font-code-data mt-1">Spatial correlation found</p>
</div>
</div>
</div>
<div class="group cursor-pointer">
<div class="flex gap-4 items-center">
<div class="w-16 h-16 glass-panel overflow-hidden shrink-0">
<div class="w-full h-full bg-cover bg-center" data-alt="A microscopic view of dark matter particles or quantum fluctuations, depicted as swirling black and grey clouds with tiny pinpoints of white light." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDZJQlvTy4Y6wL8quM2oL2X2WkjPkw_K6wPIkhbH-SEqRLraLmcgEOMXERCsfi9xs-l-68zsx9IWM45BLIta2i0HHFIqHOf-Q0aPoAjb0iing-vlO3jIxFTpMolSQPFr-nIrZpvNkk6-sXctue-24vufkz0XdAQMoj6sxZF66cluGX6PY6OBVZ5-w2MYh7JdiL51ZnHhQ0F5BvK_FLjuoR9no_9l7CcPWbTgFATRN4TcHVmGB5vfn2qHtnNaw20oJnh1uuyHb0MkY8')"></div>
</div>
<div>
<h4 class="font-label-caps text-xs text-primary-fixed group-hover:underline">DARK MATTER VOID</h4>
<p class="text-[11px] text-outline font-code-data mt-1">Adjacency report V2.1</p>
</div>
</div>
</div>
</div>
<!-- System Data Feed -->
<div class="glass-panel p-4 space-y-3 opacity-60">
<div class="font-code-data text-[10px] text-outline uppercase border-b border-outline-variant pb-1">System Feed</div>
<div class="font-code-data text-[11px] text-secondary-fixed">PING: Archive_Server-01 [9ms]</div>
<div class="font-code-data text-[11px] text-secondary-fixed">ENCRYPTION: AES-4096-QUANTUM</div>
<div class="font-code-data text-[11px] text-secondary-fixed">STATUS: ARCHIVE_IMMUTABLE</div>
</div>
</div>
</section>
</main>
<!-- Footer -->
<footer class="flex justify-between items-center w-full px-margin-desktop py-4 z-50 bg-surface-container-lowest/60 border-t border-outline-variant/30 mt-20 relative">
<div class="font-code-data text-code-data text-tertiary-fixed-dim">
            © 2144 DEEP SPACE ARCHIVE. COORDS: 42.00.01. STATUS: NOMINAL.
        </div>
<div class="flex gap-8">
<a class="font-code-data text-code-data text-outline hover:text-secondary-fixed transition-colors" href="#">Privacy Protocol</a>
<a class="font-code-data text-code-data text-outline hover:text-secondary-fixed transition-colors" href="#">Terms of Service</a>
</div>
</footer>
<!-- INTERACTION SCRIPTS -->
<script>
        // Simple scanline and hover sound placeholder logic
        document.querySelectorAll('button').forEach(btn => {
            btn.addEventListener('mouseenter', () => {
                // Future audio context sound: console_blip.wav
            });
        });

        // Dynamic coordinate update simulator
        const coordDisplay = document.querySelector('.absolute.top-8.left-8');
        setInterval(() => {
            const rand = Math.random().toFixed(2);
            coordDisplay.innerText = `COORD: 42.00.${rand} // DEEP_ARCHIVE`;
        }, 5000);
    </script>
</body></html>