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
    
<?php
    // Fetch NASA APOD
    $nasa_apod = null;
    try {
        $ch = curl_init('https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($httpCode === 200) {
            $nasa_apod = json_decode($response, true);
        }
    } catch (Exception $e) {
        // Fallback or ignore
    }
?>
    <!-- Hero Product Integration -->
    <div class="mt-20 w-full max-w-5xl bg-canvas rounded-lg border border-hairline shadow-[rgba(0,0,0,0.12)_0px_24px_48px_-8px] overflow-hidden relative z-10 flex flex-col md:flex-row text-left min-h-[500px]">
        <div class="w-full md:w-64 bg-surface border-b md:border-b-0 md:border-r border-hairline p-4 flex flex-col">
            <div class="text-[11px] font-semibold uppercase tracking-[0.5px] text-steel mb-4 mt-2 px-2">Exploration Hub</div>
            <div class="space-y-1">
                <a href="/space-shuter/study-planner" class="block px-2 py-1.5 text-sm font-medium text-ink bg-canvas rounded-md shadow-sm border border-hairline hover:text-brand-green transition-colors">Study Plan</a>
                <a href="/space-shuter/library" class="block px-2 py-1.5 text-sm text-steel hover:text-ink hover:bg-surface/50 rounded-md transition-colors">Books Library</a>
                <a href="/space-shuter/feed" class="block px-2 py-1.5 text-sm text-steel hover:text-ink hover:bg-surface/50 rounded-md transition-colors">Space Feed</a>
                <a href="/space-shuter/discover" class="block px-2 py-1.5 text-sm text-steel hover:text-ink hover:bg-surface/50 rounded-md transition-colors">Discover</a>
            </div>
            <div class="mt-auto pt-6 px-2">
                <div class="text-[10px] text-steel uppercase tracking-wider mb-2 font-semibold">Live Data</div>
                <div class="flex items-center gap-2 text-xs text-brand-green font-medium">
                    <span class="w-2 h-2 rounded-full bg-brand-green animate-pulse"></span>
                    NASA Uplink Active
                </div>
            </div>
        </div>
        <div class="flex-1 p-8 md:p-10 overflow-y-auto">
            <h2 class="text-3xl font-semibold text-ink tracking-tight mb-4">NASA Picture of the Day</h2>
            <p class="text-slate text-base mb-8">Live intelligence feed directly from NASA.</p>
            
            <?php if ($nasa_apod && isset($nasa_apod['url'])): ?>
                <div class="rounded-xl overflow-hidden border border-hairline bg-surface group relative">
                    <?php if ($nasa_apod['media_type'] === 'video'): ?>
                        <iframe class="w-full aspect-video" src="<?= htmlspecialchars($nasa_apod['url']) ?>" frameborder="0" allowfullscreen></iframe>
                    <?php else: ?>
                        <img src="<?= htmlspecialchars($nasa_apod['url']) ?>" alt="<?= htmlspecialchars($nasa_apod['title']) ?>" class="w-full h-auto object-cover max-h-[400px]">
                    <?php endif; ?>
                    <div class="p-6 bg-canvas border-t border-hairline">
                        <h3 class="text-xl font-semibold text-ink mb-2 group-hover:text-brand-green transition-colors"><?= htmlspecialchars($nasa_apod['title']) ?></h3>
                        <p class="text-sm text-slate line-clamp-3 mb-4"><?= htmlspecialchars($nasa_apod['explanation']) ?></p>
                        <div class="flex items-center justify-between text-xs text-steel">
                            <span>Date: <?= htmlspecialchars($nasa_apod['date']) ?></span>
                            <?php if (isset($nasa_apod['copyright'])): ?>
                                <span>&copy; <?= htmlspecialchars($nasa_apod['copyright']) ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="p-5 border border-hairline rounded-lg bg-canvas text-center py-12">
                    <p class="text-slate">Waiting for NASA uplink...</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
