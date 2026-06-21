<?php
require_once __DIR__ . '/../api/api.php';
include_once __DIR__ . '/../templates/bootstrap.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Sectors | Project Vision</title>
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
<body class="antialiased selection:bg-brand-green selection:text-primary min-h-screen flex flex-col bg-surface-soft">

    <nav class="fixed top-0 w-full bg-canvas/90 backdrop-blur-md border-b border-hairline z-50 h-[56px] flex items-center px-6 justify-between">
        <div class="flex items-center gap-6">
            <a href="../index.php" class="font-semibold tracking-tight text-lg text-ink">Project Vision</a>
        </div>
        <div class="hidden md:flex items-center gap-6 text-sm font-medium text-steel">
            <a href="core-discovery.php" class="hover:text-ink transition-colors">Documentation</a>
            <a href="research-archive.php" class="hover:text-ink transition-colors">Research Archive</a>
            <a href="sector-details.php" class="text-ink">Sectors</a>
        </div>
        <div class="flex items-center gap-4">
            <a href="../auth/login.php" class="text-sm font-medium text-ink hover:text-slate transition-colors">Sign In</a>
        </div>
    </nav>

    <main class="flex-1 pt-[100px] px-8 max-w-5xl mx-auto w-full pb-20">
        
        <header class="mb-12">
            <h1 class="text-[36px] font-semibold text-ink leading-[1.2] tracking-[-0.5px] mb-4">Monitored Sectors</h1>
            <p class="text-[16px] text-slate font-normal max-w-2xl">Overview of all active observation regions currently tracked by Project Vision satellites.</p>
        </header>

        <!-- Feature Comparison Table (From Mintlify DESIGN) -->
        <div class="bg-canvas border border-hairline rounded-lg overflow-hidden">
            <div class="grid grid-cols-4 bg-surface px-6 py-4 border-b border-hairline text-[13px] font-semibold text-steel uppercase tracking-[0.5px]">
                <div class="col-span-1">Sector Name</div>
                <div class="col-span-1">Status</div>
                <div class="col-span-1">Distance</div>
                <div class="col-span-1 text-right">Data Volume</div>
            </div>
            
            <div class="divide-y divide-hairline">
                <!-- Row 1 -->
                <div class="grid grid-cols-4 px-6 py-4 items-center hover:bg-surface-soft transition-colors cursor-pointer">
                    <div class="col-span-1 font-medium text-ink text-sm">Andromeda Alpha</div>
                    <div class="col-span-1 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-brand-green"></span>
                        <span class="text-sm text-slate">Active</span>
                    </div>
                    <div class="col-span-1 text-sm text-slate font-mono">2.5M ly</div>
                    <div class="col-span-1 text-sm text-steel text-right font-mono">4.2 TB</div>
                </div>

                <!-- Row 2 -->
                <div class="grid grid-cols-4 px-6 py-4 items-center hover:bg-surface-soft transition-colors cursor-pointer">
                    <div class="col-span-1 font-medium text-ink text-sm">Kepler-186</div>
                    <div class="col-span-1 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-brand-green"></span>
                        <span class="text-sm text-slate">Active</span>
                    </div>
                    <div class="col-span-1 text-sm text-slate font-mono">582 ly</div>
                    <div class="col-span-1 text-sm text-steel text-right font-mono">1.8 TB</div>
                </div>

                <!-- Row 3 -->
                <div class="grid grid-cols-4 px-6 py-4 items-center hover:bg-surface-soft transition-colors cursor-pointer">
                    <div class="col-span-1 font-medium text-ink text-sm">Sirius Binary</div>
                    <div class="col-span-1 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#d45656]"></span>
                        <span class="text-sm text-slate">Degraded</span>
                    </div>
                    <div class="col-span-1 text-sm text-slate font-mono">8.6 ly</div>
                    <div class="col-span-1 text-sm text-steel text-right font-mono">0.4 TB</div>
                </div>
            </div>
        </div>

    </main>

</body>
</html>