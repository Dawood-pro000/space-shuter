<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>STELLARIS_OS | CORE ACCESS</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700&amp;family=Space+Grotesk:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<!-- Tailwind Configuration -->
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "tertiary-fixed-dim": "#bec7d6",
                    "tertiary-fixed": "#dae3f2",
                    "outline-variant": "#3c4948",
                    "surface-variant": "#333536",
                    "error": "#ffb4ab",
                    "on-background": "#e2e2e3",
                    "primary": "#ffffff",
                    "secondary": "#7bd6d1",
                    "tertiary-container": "#dae3f2",
                    "on-primary-container": "#00716b",
                    "on-primary-fixed": "#00201e",
                    "background": "#0B0C10",
                    "secondary-fixed": "#98f2ed",
                    "surface-container-lowest": "#0c0f0f",
                    "inverse-surface": "#e2e2e3",
                    "on-tertiary": "#28313c",
                    "on-surface": "#e2e2e3",
                    "surface-tint": "#3cdcd1",
                    "tertiary": "#ffffff",
                    "surface-bright": "#37393a",
                    "on-tertiary-fixed-variant": "#3e4753",
                    "secondary-fixed-dim": "#7bd6d1",
                    "primary-fixed": "#62f9ee",
                    "surface-container": "#1e2021",
                    "primary-fixed-dim": "#3cdcd1",
                    "on-secondary-fixed": "#00201f",
                    "surface-container-low": "#1a1c1d",
                    "inverse-primary": "#006a64",
                    "primary-container": "#62f9ee",
                    "surface-container-high": "#282a2b",
                    "on-error": "#690005",
                    "error-container": "#93000a",
                    "on-primary": "#003734",
                    "on-primary-fixed-variant": "#00504b",
                    "on-secondary": "#003735",
                    "on-error-container": "#ffdad6",
                    "on-secondary-fixed-variant": "#00504d",
                    "on-surface-variant": "#bacac7",
                    "surface-container-highest": "#333536",
                    "secondary-container": "#007774",
                    "outline": "#859491",
                    "on-tertiary-container": "#5c6572",
                    "on-secondary-container": "#a1fcf7",
                    "surface-dim": "#0B0C10",
                    "inverse-on-surface": "#2e3132",
                    "on-tertiary-fixed": "#131c27",
                    "surface": "#0B0C10"
            },
            "borderRadius": {
                    "DEFAULT": "0px",
                    "lg": "0px",
                    "xl": "0px",
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
                    "headline-lg-mobile": ["Orbitron"],
                    "label-caps": ["Space Grotesk"],
                    "headline-md": ["Orbitron"],
                    "body-lg": ["Space Grotesk"],
                    "code-data": ["Space Grotesk"],
                    "headline-lg": ["Orbitron"],
                    "body-md": ["Space Grotesk"]
            },
            "fontSize": {
                    "headline-lg-mobile": ["32px", {"lineHeight": "1.2", "fontWeight": "700"}],
                    "label-caps": ["12px", {"lineHeight": "1", "letterSpacing": "0.15em", "fontWeight": "700"}],
                    "headline-md": ["24px", {"lineHeight": "1.2", "letterSpacing": "0.02em", "fontWeight": "600"}],
                    "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                    "code-data": ["14px", {"lineHeight": "1.4", "letterSpacing": "0.01em", "fontWeight": "500"}],
                    "headline-lg": ["48px", {"lineHeight": "1.1", "letterSpacing": "0.05em", "fontWeight": "700"}],
                    "body-md": ["16px", {"lineHeight": "1.5", "fontWeight": "400"}]
            }
          },
        },
      }
    </script>
<style>
        .glass-panel {
            background: rgba(31, 40, 51, 0.4);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(69, 162, 158, 0.3);
        }
        
        .scanline {
            width: 100%;
            height: 2px;
            background: rgba(102, 252, 241, 0.1);
            position: absolute;
            top: 0;
            left: 0;
            z-index: 10;
            animation: scan 8s linear infinite;
        }

        @keyframes scan {
            0% { top: 0; }
            100% { top: 100%; }
        }

        .glow-button {
            box-shadow: 0 0 15px rgba(102, 252, 241, 0.3);
            transition: all 0.3s ease;
        }

        .glow-button:hover {
            box-shadow: 0 0 25px rgba(102, 252, 241, 0.5);
            transform: scale(1.02);
        }

        .input-underlined {
            border-bottom: 1px solid #1F2833;
            background: transparent;
            transition: border-color 0.3s ease;
        }

        .input-underlined:focus {
            border-bottom: 1px solid #66FCF1;
            outline: none;
        }

        .hud-grid {
            background-size: 40px 40px;
            background-image: 
                linear-gradient(to right, rgba(69, 162, 158, 0.05) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(69, 162, 158, 0.05) 1px, transparent 1px);
        }

        .data-stream {
            font-family: 'Space Grotesk', monospace;
            font-size: 10px;
            line-height: 1.2;
            color: rgba(102, 252, 241, 0.2);
            pointer-events: none;
        }
    </style>
</head>
<body class="bg-background text-on-background min-h-screen flex items-center justify-center overflow-hidden font-body-md selection:bg-primary-fixed-dim selection:text-on-primary-fixed">
<!-- Background Layer -->
<div class="fixed inset-0 z-0 hud-grid">

<!-- HUD Technical Overlays -->
<div class="absolute top-8 left-8 data-stream hidden md:block">
            LAT: 42.08.11<br/>
            LON: 73.12.05<br/>
            SYS: OPTIMAL<br/>
<span class="text-secondary-fixed">ENCRYPTION: AES-256</span>
</div>
<div class="absolute bottom-8 right-8 data-stream text-right hidden md:block">
            STATION: SECTOR-7G<br/>
            OS: STELLARIS_v4.2.0<br/>
            SIGNAL: ENCRYPTED<br/>
<span class="text-primary-fixed-dim">UPLINK: 14MS</span>
</div>
<!-- Corner Brackets -->
<div class="absolute top-4 left-4 w-12 h-12 border-t-2 border-l-2 border-outline-variant opacity-50"></div>
<div class="absolute top-4 right-4 w-12 h-12 border-t-2 border-r-2 border-outline-variant opacity-50"></div>
<div class="absolute bottom-4 left-4 w-12 h-12 border-b-2 border-l-2 border-outline-variant opacity-50"></div>
<div class="absolute bottom-4 right-4 w-12 h-12 border-b-2 border-r-2 border-outline-variant opacity-50"></div>
</div>
<!-- Main Auth Module -->
<main class="relative z-20 w-full max-w-lg px-margin-mobile md:px-0">
<div class="glass-panel relative p-8 md:p-12 overflow-hidden">
<div class="scanline"></div>
<!-- Branding Header -->
<header class="mb-12 text-center">
<div class="flex justify-center mb-6">
<span class="material-symbols-outlined text-primary-fixed-dim text-5xl" style="font-variation-settings: 'FILL' 1;">
                        security
                    </span>
</div>
<h1 class="font-headline-md text-headline-md text-primary tracking-[0.2em] mb-2">CORE ACCESS: LOGIN</h1>
<p class="font-label-caps text-label-caps text-on-surface-variant opacity-70">IDENTIFY TO PROCEED TO SECTOR-7G</p>
</header>
<!-- Authentication Form -->
<form action="#" class="space-y-8">
<!-- User ID Field -->
<div class="relative group">
<div class="flex items-center gap-4 mb-2">
<span class="material-symbols-outlined text-secondary-fixed-dim text-sm">person</span>
<label class="font-label-caps text-label-caps text-secondary-fixed-dim">USER ID (EMAIL)</label>
</div>
<input class="w-full input-underlined py-3 text-body-md text-primary font-code-data placeholder:text-outline-variant transition-all" placeholder="PILOT@STELLARIS.SYS" type="email"/>
<div class="absolute top-0 right-0 font-code-data text-[10px] text-outline-variant group-focus-within:text-secondary-fixed-dim">ID_AUTH_01</div>
</div>
<!-- Access Key Field -->
<div class="relative group">
<div class="flex items-center gap-4 mb-2">
<span class="material-symbols-outlined text-secondary-fixed-dim text-sm">key</span>
<label class="font-label-caps text-label-caps text-secondary-fixed-dim">ACCESS KEY (PASSWORD)</label>
</div>
<input class="w-full input-underlined py-3 text-body-md text-primary font-code-data placeholder:text-outline-variant transition-all" placeholder="••••••••••••" type="password"/>
<div class="absolute top-0 right-0 font-code-data text-[10px] text-outline-variant group-focus-within:text-secondary-fixed-dim">KEY_VAL_7G</div>
</div>
<!-- Action Section -->
<div class="pt-4 space-y-6">
<button class="w-full bg-primary-fixed text-on-primary-fixed font-headline-md py-4 glow-button flex items-center justify-center gap-3 relative group" type="submit">
<span class="relative z-10">INITIATE SESSION</span>
<span class="material-symbols-outlined relative z-10 group-hover:translate-x-1 transition-transform">bolt</span>
<!-- Secondary pulse effect -->
<div class="absolute inset-0 bg-primary-fixed-dim opacity-0 group-active:opacity-100 transition-opacity"></div>
</button>
<div class="flex items-center gap-4">
<div class="h-[1px] flex-1 bg-outline-variant opacity-30"></div>
<span class="font-label-caps text-[10px] text-outline-variant">OAUTH SYSTEMS</span>
<div class="h-[1px] flex-1 bg-outline-variant opacity-30"></div>
</div>
<button class="w-full border border-outline-variant hover:border-secondary-fixed py-3 font-label-caps text-label-caps text-on-surface hover:text-secondary-fixed transition-all flex items-center justify-center gap-3 bg-surface-container-low/20" type="button">
<span class="material-symbols-outlined text-sm">login</span>
                        GOOGLE OAUTH
                    </button>
</div>
</form>
<!-- Footer Links -->
<footer class="mt-12 flex flex-col md:flex-row items-center justify-between gap-4 font-code-data text-code-data text-on-surface-variant">
<a class="hover:text-primary-fixed-dim transition-colors flex items-center gap-2 group" href="#">
<span class="material-symbols-outlined text-sm opacity-50 group-hover:opacity-100">help_center</span>
                    FORGOT ACCESS KEY?
                </a>
<a class="hover:text-secondary-fixed-dim transition-colors flex items-center gap-2 group" href="#">
<span class="material-symbols-outlined text-sm opacity-50 group-hover:opacity-100">person_add</span>
                    NEW PILOT? REGISTER
                </a>
</footer>
<!-- Technical Detail Overlay -->
<div class="absolute top-2 right-2 font-code-data text-[8px] text-outline-variant/30 select-none">
                #CORE_AUTH_MOD_REF_99182
            </div>
</div>
<!-- Ambient Secondary Data -->
<div class="mt-8 flex justify-center items-center gap-8 text-on-surface-variant opacity-40 font-code-data text-[10px]">
<div class="flex items-center gap-2">
<div class="w-1.5 h-1.5 rounded-full bg-secondary-fixed-dim animate-pulse"></div>
                CORE_v4.2.0-STABLE
            </div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[10px]">public</span>
                GLOBAL_NET_SECURED
            </div>
</div>
</main>
<!-- UI Interaction Scripts -->
<script>
        // Micro-interaction for form focus
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', () => {
                // Potential sound effect trigger or visual pulse
                console.log('Access point engaged');
            });
        });

        // Background data stream simulation
        const streams = document.querySelectorAll('.data-stream');
        setInterval(() => {
            streams.forEach(stream => {
                if(Math.random() > 0.8) {
                    stream.style.opacity = '0.4';
                    setTimeout(() => stream.style.opacity = '1', 50);
                }
            });
        }, 2000);
    </script>
</body></html>