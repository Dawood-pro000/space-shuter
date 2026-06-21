<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>STELLARIS_OS | NEW PILOT REGISTRATION</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700&amp;family=Space+Grotesk:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
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
                    "background": "#111415",
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
                    "surface-dim": "#111415",
                    "inverse-on-surface": "#2e3132",
                    "on-tertiary-fixed": "#131c27",
                    "surface": "#111415"
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
        body {
            background-color: #0b0c10;
            overflow: hidden;
            margin: 0;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .scanline {
            background: linear-gradient(to bottom, rgba(102, 252, 241, 0) 0%, rgba(102, 252, 241, 0.05) 50%, rgba(102, 252, 241, 0) 100%);
            background-size: 100% 4px;
            pointer-events: none;
        }
        .hud-border {
            clip-path: polygon(
                0 0, 20% 0, 25% 5px, 75% 5px, 80% 0, 100% 0, 
                100% 100%, 80% 100%, 75% calc(100% - 5px), 25% calc(100% - 5px), 20% 100%, 0 100%
            );
        }
        .text-glow {
            text-shadow: 0 0 10px rgba(102, 252, 241, 0.4);
        }
        .glass-panel {
            background: rgba(31, 40, 51, 0.4);
            backdrop-filter: blur(12px);
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen selection:bg-primary-fixed selection:text-on-primary-fixed">
<!-- Background Shader -->

<!-- Overlay Effects -->
<div class="fixed inset-0 scanline z-50 pointer-events-none"></div>
<div class="fixed inset-0 bg-[radial-gradient(circle_at_center,transparent_0%,rgba(0,0,0,0.8)_100%)] pointer-events-none"></div>
<!-- HUD Elements (Non-Functional) -->
<div class="fixed top-8 left-8 flex flex-col font-code-data text-code-data text-secondary-fixed-dim/40 gap-1 uppercase">
<span>sys_link: connected</span>
<span>protocol_v: 4.2.0</span>
<span>pos: 42.08.11 // 14MS</span>
</div>
<div class="fixed bottom-8 right-8 flex flex-col items-end font-code-data text-code-data text-secondary-fixed-dim/40 gap-1 uppercase">
<span>core_temp: stable</span>
<span>encryption: active</span>
<span>pilot_status: awaiting_input</span>
</div>
<!-- Registration Canvas -->
<main class="relative z-10 w-full max-w-[540px] px-margin-mobile md:px-0">
<div class="glass-panel border-l-2 border-primary-fixed-dim p-8 md:p-12 shadow-[0_0_40px_rgba(0,0,0,0.5)]">
<!-- Branding/Header -->
<header class="mb-10">
<div class="flex items-center justify-between mb-4">
<span class="font-label-caps text-label-caps text-primary-fixed tracking-[0.3em]">STELLARIS_OS</span>
<span class="font-code-data text-code-data text-secondary-fixed-dim/50">SEC_LEVEL: 0</span>
</div>
<h1 class="font-headline-lg-mobile md:font-headline-lg md:text-headline-lg text-primary text-glow leading-none mb-2">NEW PILOT REGISTRATION</h1>
<p class="font-label-caps text-label-caps text-secondary-fixed-dim opacity-70 tracking-widest flex items-center gap-2">
<span class="material-symbols-outlined text-[14px]">sync</span>
                    INITIALIZING COMMAND PROTOCOLS
                </p>
</header>
<!-- Registration Form -->
<form class="space-y-6" id="registrationForm">
<!-- Full Name -->
<div class="group">
<label class="block font-label-caps text-label-caps text-on-surface-variant mb-2 tracking-widest" for="fullName">PILOT HANDLE</label>
<div class="relative">
<input class="w-full bg-transparent border-0 border-b border-outline-variant py-3 px-0 text-on-surface font-body-md focus:ring-0 focus:border-primary-fixed transition-all placeholder:text-surface-variant" id="fullName" name="fullName" placeholder="IDENTIFIER_NAME" required="" type="text"/>
<div class="absolute right-0 top-1/2 -translate-y-1/2 font-code-data text-[10px] text-surface-variant group-focus-within:text-primary-fixed-dim">01</div>
</div>
</div>
<!-- Email -->
<div class="group">
<label class="block font-label-caps text-label-caps text-on-surface-variant mb-2 tracking-widest" for="email">COMMS CHANNEL (EMAIL)</label>
<div class="relative">
<input class="w-full bg-transparent border-0 border-b border-outline-variant py-3 px-0 text-on-surface font-body-md focus:ring-0 focus:border-primary-fixed transition-all placeholder:text-surface-variant" id="email" name="email" placeholder="NAME@NETWORK.CORE" required="" type="email"/>
<div class="absolute right-0 top-1/2 -translate-y-1/2 font-code-data text-[10px] text-surface-variant group-focus-within:text-primary-fixed-dim">02</div>
</div>
</div>
<!-- Password -->
<div class="group">
<label class="block font-label-caps text-label-caps text-on-surface-variant mb-2 tracking-widest" for="password">ACCESS KEY</label>
<div class="relative">
<input class="w-full bg-transparent border-0 border-b border-outline-variant py-3 px-0 text-on-surface font-body-md focus:ring-0 focus:border-primary-fixed transition-all placeholder:text-surface-variant" id="password" name="password" placeholder="••••••••••••" required="" type="password"/>
<div class="absolute right-0 top-1/2 -translate-y-1/2 font-code-data text-[10px] text-surface-variant group-focus-within:text-primary-fixed-dim">03</div>
</div>
</div>
<!-- Confirm Password -->
<div class="group">
<label class="block font-label-caps text-label-caps text-on-surface-variant mb-2 tracking-widest" for="confirmPassword">VERIFY ACCESS KEY</label>
<div class="relative">
<input class="w-full bg-transparent border-0 border-b border-outline-variant py-3 px-0 text-on-surface font-body-md focus:ring-0 focus:border-primary-fixed transition-all placeholder:text-surface-variant" id="confirmPassword" name="confirmPassword" placeholder="••••••••••••" required="" type="password"/>
<div class="absolute right-0 top-1/2 -translate-y-1/2 font-code-data text-[10px] text-surface-variant group-focus-within:text-primary-fixed-dim">04</div>
</div>
</div>
<!-- Checkbox -->
<div class="flex items-start gap-3 pt-2">
<div class="relative flex items-center">
<input class="w-4 h-4 bg-transparent border border-outline-variant text-primary-fixed focus:ring-0 focus:ring-offset-0 rounded-none transition-all cursor-pointer" id="protocols" name="protocols" required="" type="checkbox"/>
</div>
<label class="font-code-data text-[11px] text-on-surface-variant/80 uppercase tracking-wider leading-relaxed cursor-pointer hover:text-on-surface transition-colors" for="protocols">
                        AGREE TO DEEP-SPACE PROTOCOLS &amp; SUBMIT TO CORE MONITORING SYSTEMS FOR DURATION OF MISSION.
                    </label>
</div>
<!-- CTA Button -->
<div class="pt-6">
<button class="w-full bg-primary-fixed text-on-primary-fixed font-label-caps text-label-caps py-5 tracking-[0.2em] relative overflow-hidden transition-all active:scale-[0.98] group" type="submit">
<span class="relative z-10">REGISTER PILOT</span>
<div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-20 transition-opacity"></div>
<!-- Decorative corners for the button -->
<div class="absolute top-0 left-0 w-1 h-1 bg-on-primary-fixed"></div>
<div class="absolute bottom-0 right-0 w-1 h-1 bg-on-primary-fixed"></div>
</button>
</div>
</form>
<!-- Footer Link -->
<footer class="mt-8 flex justify-center">
<a class="font-label-caps text-label-caps text-on-surface-variant hover:text-primary-fixed transition-colors flex items-center gap-2 group" href="#">
                    ALREADY REGISTERED? <span class="text-primary-fixed group-hover:underline">LOGIN</span>
<span class="material-symbols-outlined text-[16px] transition-transform group-hover:translate-x-1">arrow_forward</span>
</a>
</footer>
<!-- Technical Detail Overlays -->
<div class="absolute -top-1 -right-1 font-code-data text-[8px] text-primary-fixed-dim/30 rotate-90 origin-bottom-right">REG_SEQ_INIT_8841</div>
<div class="absolute -bottom-1 -left-1 font-code-data text-[8px] text-primary-fixed-dim/30">LATENCY_STABLE: 0.003ms</div>
</div>
<!-- System Log Message -->
<div class="mt-6 font-code-data text-code-data text-secondary-fixed-dim/30 flex items-center justify-between px-4">
<span class="animate-pulse">_WAITING FOR CREDENTIAL INPUT...</span>
<span id="timestamp">STARDATE: 2142.11.08</span>
</div>
</main>
<script>
        // Simple micro-interaction for form submission
        const form = document.getElementById('registrationForm');
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const btn = e.target.querySelector('button');
            const originalText = btn.innerText;
            btn.innerText = "AUTHENTICATING...";
            btn.classList.add('opacity-50', 'pointer-events-none');
            
            setTimeout(() => {
                btn.innerText = "PILOT ACCEPTED";
                btn.classList.remove('bg-primary-fixed');
                btn.classList.add('bg-secondary');
                
                // Visual confirmation
                const log = document.querySelector('main > div:last-child span:first-child');
                log.innerText = "_PILOT_ID_CREATED: REDIRECTING_TO_BAY_04";
                log.classList.remove('text-secondary-fixed-dim/30');
                log.classList.add('text-primary-fixed');
            }, 1500);
        });

        // Dynamic time updating (faked for stardate)
        function updateStardate() {
            const now = new Date();
            const year = 2142;
            const month = (now.getMonth() + 1).toString().padStart(2, '0');
            const day = now.getDate().toString().padStart(2, '0');
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            document.getElementById('timestamp').innerText = `STARDATE: ${year}.${month}.${day}.${hours}${minutes}`;
        }
        setInterval(updateStardate, 60000);
        updateStardate();

        // HUD parallax effect
        document.addEventListener('mousemove', (e) => {
            const moveX = (e.clientX - window.innerWidth / 2) / 50;
            const moveY = (e.clientY - window.innerHeight / 2) / 50;
            document.querySelector('.glass-panel').style.transform = `translate(${moveX}px, ${moveY}px)`;
        });
    </script>
<!-- Footer Component Injection -->
<div class="fixed bottom-0 w-full z-20">
<div class="flex justify-between items-center w-full px-margin-desktop py-4 bg-surface-container-lowest border-t border-outline-variant">
<div class="flex items-center gap-6">
<span class="font-label-caps text-label-caps text-primary">© 2142 STAR-LINK SYSTEMS</span>
<span class="font-code-data text-code-data text-on-surface-variant opacity-40">CORE_v4.2.0-STABLE</span>
</div>
<div class="hidden md:flex gap-8">
<span class="font-code-data text-code-data text-on-surface-variant hover:text-secondary-fixed cursor-default transition-colors">SYS_STATUS: OPTIMAL</span>
<span class="font-code-data text-code-data text-on-surface-variant hover:text-secondary-fixed cursor-default transition-colors">COORD: 42.08.11</span>
<span class="font-code-data text-code-data text-on-surface-variant hover:text-secondary-fixed cursor-default transition-colors">LATENCY: 14MS</span>
</div>
</div>
</div>
</body></html>