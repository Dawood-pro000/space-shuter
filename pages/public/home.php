<?php
// pages/public/home.php
$page_title = 'Space Shutter | The Intelligent Knowledge Platform';
require_once __DIR__ . '/../../layouts/header.php';
?>

<!-- Atmospheric Hero Section -->
<section class="hero-gradient pt-32 pb-24 px-8 min-h-[80vh] flex flex-col items-center justify-center text-center overflow-hidden relative">
    <div class="max-w-4xl relative z-10 space-y-8 mt-12">
        <h1 class="text-[72px] leading-[1.05] tracking-[-2px] font-semibold text-primary">
            The intelligent<br/>Knowledge Platform
        </h1>
        <p class="text-lg text-slate max-w-2xl mx-auto font-normal">
            Space Shutter presents documentation and space intelligence infrastructure with a dual-mode aesthetic. 
            We deliver atmospheric marketing presentation paired with dense developer-grade reading surfaces.
        </p>
        <div class="flex items-center justify-center gap-4 pt-4">
            <a href="/space-shuter/register" class="bg-brand-green text-primary px-6 py-3 rounded-full text-sm font-medium hover:bg-brand-green-deep transition-colors shadow-sm">
                Get started
            </a>
            <a href="/space-shuter/discover" class="bg-transparent border border-primary text-primary px-6 py-3 rounded-full text-sm font-medium hover:bg-primary/5 transition-colors">
                Explore Feed
            </a>
        </div>
    </div>
    
    <!-- Hero Product Mockup -->
    <div class="mt-20 w-full max-w-5xl bg-canvas rounded-lg border border-hairline shadow-[rgba(0,0,0,0.12)_0px_24px_48px_-8px] overflow-hidden relative z-10 flex text-left h-[500px]">
        <div class="w-64 bg-surface border-r border-hairline p-4 hidden md:block">
            <div class="text-[11px] font-semibold uppercase tracking-[0.5px] text-steel mb-4 mt-2 px-2">Knowledge Base</div>
            <div class="space-y-1">
                <div class="px-2 py-1.5 text-sm font-medium text-ink bg-canvas rounded-md shadow-sm border border-hairline">Overview</div>
                <div class="px-2 py-1.5 text-sm text-steel hover:text-ink cursor-pointer">Quickstart</div>
                <div class="px-2 py-1.5 text-sm text-steel hover:text-ink cursor-pointer">API Reference</div>
            </div>
        </div>
        <div class="flex-1 p-10 overflow-hidden">
            <h2 class="text-3xl font-semibold text-ink tracking-tight mb-4">Latest Discovery</h2>
            <p class="text-slate text-base mb-8">Access the newest telemetry and aerospace articles directly from the registry.</p>
            
            <div class="space-y-4">
                <div class="p-5 border border-hairline rounded-lg hover:shadow-sm transition-shadow flex items-start justify-between group cursor-pointer bg-canvas">
                    <div>
                        <h3 class="text-base font-semibold text-ink mb-1 group-hover:text-brand-green transition-colors">JWST Discovers Water Vapor</h3>
                        <p class="text-sm text-slate line-clamp-1">New spectroscopic analysis reveals signs of atmospheric water on K2-18b.</p>
                    </div>
                    <span class="text-xs font-medium text-steel bg-surface px-2 py-1 rounded-sm border border-hairline whitespace-nowrap">Featured</span>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
