<?php
require_once __DIR__ . '/../api/api.php';
include_once __DIR__ . '/../templates/bootstrap.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Research Archive | Project Vision</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Geist+Mono:wght@400;500&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#0a0a0a",
                        "on-primary": "#ffffff",
                        "brand-green": "#00d4a4",
                        canvas: "#ffffff",
                        surface: "#f7f7f7",
                        "surface-soft": "#fafafa",
                        hairline: "#e5e5e5",
                        ink: "#0a0a0a",
                        slate: "#3a3a3c",
                        steel: "#5a5a5c",
                    },
                    fontFamily: {
                        sans: ["Inter", "sans-serif"],
                        mono: ["Geist Mono", "monospace"],
                    },
                    borderRadius: { md: "8px", lg: "12px", full: "9999px" }
                }
            }
        }
    </script>
</head>
<body class="antialiased selection:bg-brand-green selection:text-primary min-h-screen flex flex-col bg-canvas">

    <!-- Top Navigation (Documentation) -->
    <nav class="fixed top-0 w-full bg-canvas/90 backdrop-blur-md border-b border-hairline z-50 h-[56px] flex items-center px-6 justify-between">
        <div class="flex items-center gap-6">
            <a href="../index.php" class="font-semibold tracking-tight text-lg text-ink">Project Vision</a>
        </div>
        <div class="hidden md:flex items-center gap-6 text-sm font-medium text-steel">
            <a href="core-discovery.php" class="hover:text-ink transition-colors">Documentation</a>
            <a href="research-archive.php" class="text-ink">Research Archive</a>
            <a href="sector-details.php" class="hover:text-ink transition-colors">Sectors</a>
        </div>
        <div class="flex items-center gap-4">
            <a href="../auth/login.php" class="text-sm font-medium text-ink hover:text-slate transition-colors">Sign In</a>
        </div>
    </nav>

    <main class="flex-1 pt-[100px] px-8 max-w-6xl mx-auto w-full pb-20">
        
        <header class="mb-12">
            <h1 class="text-[36px] font-semibold text-ink leading-[1.2] tracking-[-0.5px] mb-4">Research Archive</h1>
            <p class="text-[16px] text-slate font-normal max-w-2xl">Browse the complete historical logs of deep space phenomena, parsed by the Gemini pipeline.</p>
        </header>

        <!-- Search Bar -->
        <div class="mb-10 flex gap-4">
            <div class="relative flex-1 max-w-xl">
                <svg class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-steel" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <input type="text" placeholder="Search archive logs..." class="w-full pl-10 pr-4 py-2 bg-surface border border-hairline rounded-md text-sm text-ink focus:outline-none focus:border-brand-green focus:ring-1 focus:ring-brand-green">
            </div>
            <button class="bg-surface text-ink border border-hairline px-4 py-2 rounded-md text-sm font-medium hover:bg-hairline-soft transition-colors">Filter</button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <!-- Card 1 -->
            <div class="bg-canvas border border-hairline rounded-lg p-6 hover:shadow-[rgba(0,0,0,0.04)_0px_4px_12px_0px] transition-shadow flex flex-col cursor-pointer">
                <div class="text-[11px] font-semibold uppercase tracking-[0.5px] text-steel mb-3 bg-surface self-start px-2 py-1 rounded-sm border border-hairline">Astro-Physics</div>
                <h3 class="text-lg font-semibold text-ink mb-2">Quantum Fluctuation in Sector 4</h3>
                <p class="text-sm text-slate line-clamp-3 mb-6 flex-1">Detected anomalous temporal distortions near the event horizon of Sag-A*. Gemini Analysis indicates a 94.2% probability of non-linear causality loops.</p>
                <div class="flex justify-between items-center text-xs text-steel font-mono pt-4 border-t border-hairline">
                    <span>ID: ARCH-001</span>
                    <span>2144.079</span>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-canvas border border-hairline rounded-lg p-6 hover:shadow-[rgba(0,0,0,0.04)_0px_4px_12px_0px] transition-shadow flex flex-col cursor-pointer">
                <div class="text-[11px] font-semibold uppercase tracking-[0.5px] text-steel mb-3 bg-surface self-start px-2 py-1 rounded-sm border border-hairline">Telemetry</div>
                <h3 class="text-lg font-semibold text-ink mb-2">Nebula M7-X Composition</h3>
                <p class="text-sm text-slate line-clamp-3 mb-6 flex-1">Radiographic analysis confirms heavy element synthesis in the outer shell. Atmospheric composition consists of 40% Argon, 12% Xenon. Radiation levels are critical.</p>
                <div class="flex justify-between items-center text-xs text-steel font-mono pt-4 border-t border-hairline">
                    <span>ID: LOG-442</span>
                    <span>2144.081</span>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-canvas border border-hairline rounded-lg p-6 hover:shadow-[rgba(0,0,0,0.04)_0px_4px_12px_0px] transition-shadow flex flex-col cursor-pointer">
                <div class="text-[11px] font-semibold uppercase tracking-[0.5px] text-[#d45656] bg-[#d45656]/10 mb-3 self-start px-2 py-1 rounded-sm border border-[#d45656]/20">Critical Anomaly</div>
                <h3 class="text-lg font-semibold text-ink mb-2">Pulsar Synchronization</h3>
                <p class="text-sm text-slate line-clamp-3 mb-6 flex-1">Observation of three disparate pulsars synchronizing their rotation periods across 14 light years. Statistical impossibility suggests external manipulation.</p>
                <div class="flex justify-between items-center text-xs text-steel font-mono pt-4 border-t border-hairline">
                    <span>ID: CR-92.4</span>
                    <span>2144.082</span>
                </div>
            </div>

        </div>
    </main>

</body>
</html>