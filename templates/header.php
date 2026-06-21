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
