<?php
// pages/public/pricing.php
$page_title = 'Pricing | Space Shutter';
require_once __DIR__ . '/../../layouts/header.php';
?>

<main class="pt-32 pb-24 px-8 max-w-6xl mx-auto min-h-[80vh]">
    <div class="text-center mb-16">
        <h1 class="text-4xl font-semibold text-ink tracking-tight mb-4">Simple, transparent pricing</h1>
        <p class="text-slate text-lg max-w-2xl mx-auto">Access the universe's most comprehensive telemetry and aerospace database.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Free Tier -->
        <div class="bg-canvas border border-hairline rounded-2xl p-8 flex flex-col relative hover:border-steel/30 transition-colors">
            <h3 class="text-lg font-medium text-ink mb-2">Cadet</h3>
            <div class="mb-4">
                <span class="text-4xl font-semibold text-ink">$0</span>
                <span class="text-slate text-sm">/month</span>
            </div>
            <p class="text-sm text-slate mb-8 h-10">For space enthusiasts starting their journey.</p>
            <ul class="space-y-4 text-sm text-slate mb-8 flex-1">
                <li class="flex items-start gap-3"><svg class="w-5 h-5 text-brand-green shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Access to public APOD feed</li>
                <li class="flex items-start gap-3"><svg class="w-5 h-5 text-brand-green shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Save up to 10 bookmarks</li>
                <li class="flex items-start gap-3"><svg class="w-5 h-5 text-brand-green shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Standard community support</li>
            </ul>
            <a href="/space-shuter/register" class="w-full bg-surface text-ink border border-hairline font-medium text-sm py-2.5 rounded-lg hover:bg-hairline transition-colors text-center">Start for free</a>
        </div>

        <!-- Pro Tier -->
        <div class="bg-primary border border-primary rounded-2xl p-8 flex flex-col relative shadow-[0_8px_30px_rgb(0,0,0,0.12)] scale-105 z-10">
            <div class="absolute -top-3 inset-x-0 flex justify-center">
                <span class="bg-brand-green text-primary text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full">Most Popular</span>
            </div>
            <h3 class="text-lg font-medium text-on-primary mb-2">Commander</h3>
            <div class="mb-4">
                <span class="text-4xl font-semibold text-on-primary">$12</span>
                <span class="text-on-dark-muted text-sm">/month</span>
            </div>
            <p class="text-sm text-on-dark-muted mb-8 h-10">For researchers needing deep-space intelligence.</p>
            <ul class="space-y-4 text-sm text-on-dark mb-8 flex-1">
                <li class="flex items-start gap-3"><svg class="w-5 h-5 text-brand-green shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Full JWST & Hubble telemetry access</li>
                <li class="flex items-start gap-3"><svg class="w-5 h-5 text-brand-green shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Unlimited bookmarks & study plans</li>
                <li class="flex items-start gap-3"><svg class="w-5 h-5 text-brand-green shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>AI Assistant access (Gemini integration)</li>
                <li class="flex items-start gap-3"><svg class="w-5 h-5 text-brand-green shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Priority email support</li>
            </ul>
            <a href="/space-shuter/register" class="w-full bg-brand-green text-primary font-medium text-sm py-2.5 rounded-lg hover:bg-brand-green-deep transition-colors text-center">Upgrade to Commander</a>
        </div>

        <!-- Enterprise Tier -->
        <div class="bg-canvas border border-hairline rounded-2xl p-8 flex flex-col relative hover:border-steel/30 transition-colors">
            <h3 class="text-lg font-medium text-ink mb-2">Agency</h3>
            <div class="mb-4">
                <span class="text-4xl font-semibold text-ink">Custom</span>
            </div>
            <p class="text-sm text-slate mb-8 h-10">For universities and space agencies.</p>
            <ul class="space-y-4 text-sm text-slate mb-8 flex-1">
                <li class="flex items-start gap-3"><svg class="w-5 h-5 text-steel shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Custom API throughput</li>
                <li class="flex items-start gap-3"><svg class="w-5 h-5 text-steel shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Dedicated account manager</li>
                <li class="flex items-start gap-3"><svg class="w-5 h-5 text-steel shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>SSO & advanced security</li>
            </ul>
            <a href="/space-shuter/contact" class="w-full bg-surface text-ink border border-hairline font-medium text-sm py-2.5 rounded-lg hover:bg-hairline transition-colors text-center">Contact Sales</a>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
