<?php
// pages/public/home.php
$page_title = 'Space Shutter | The Intelligent Knowledge Platform';
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../services/DatabaseService.php';

$db = DatabaseService::getConnection();

// Fetch latest posts to populate sections
$stmt = $db->query("SELECT title, slug, abstract, image_url, publish_date FROM posts WHERE status = 'published' ORDER BY created_at DESC LIMIT 15");
$all_posts = $stmt->fetchAll();

// Split posts into categories
$hero_post = $all_posts[0] ?? null;
$spotlight_posts = array_slice($all_posts, 1, 3);
$recommended_posts = array_slice($all_posts, 4, 4);
$trending_posts = array_slice($all_posts, 8, 4);

// Try to fetch NASA APOD for the Hero Slide if available
$nasa_apod = null;
try {
    $ch = curl_init('https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 3);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($httpCode === 200) {
        $nasa_apod = json_decode($response, true);
    }
} catch (Exception $e) {}
?>

<!-- Atmospheric Hero Section -->
<section class="hero-gradient pt-32 pb-16 px-8 flex flex-col items-center justify-center text-center overflow-hidden relative">
    <div class="max-w-4xl relative z-10 space-y-6 mt-12 mb-12">
        <h1 class="text-[56px] md:text-[72px] leading-[1.05] tracking-[-2px] font-semibold text-primary">
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
</section>

<!-- Main Content Areas -->
<main class="max-w-7xl mx-auto px-8 py-12 space-y-20">

    <!-- Hero Slide -->
    <section>
        <div class="flex items-center justify-between mb-6 border-b border-hairline pb-2">
            <h2 class="text-2xl font-semibold text-ink tracking-tight">Featured Hero Slide</h2>
            <span class="text-sm font-medium text-brand-green bg-brand-green/10 px-3 py-1 rounded-full">Top Story</span>
        </div>
        
        <?php if ($nasa_apod && isset($nasa_apod['url'])): ?>
            <!-- APOD Hero -->
            <div class="relative rounded-2xl overflow-hidden group shadow-[0_8px_30px_rgb(0,0,0,0.12)]">
                <?php if ($nasa_apod['media_type'] === 'video'): ?>
                    <iframe class="w-full h-[500px] object-cover" src="<?= htmlspecialchars($nasa_apod['url']) ?>" frameborder="0" allowfullscreen></iframe>
                <?php else: ?>
                    <img src="<?= htmlspecialchars($nasa_apod['url']) ?>" alt="NASA APOD" class="w-full h-[500px] object-cover group-hover:scale-105 transition-transform duration-700">
                <?php endif; ?>
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 p-10 w-full md:w-3/4 text-white">
                    <span class="text-xs font-bold uppercase tracking-widest text-brand-green mb-3 block">NASA Daily Uplink</span>
                    <h3 class="text-3xl md:text-4xl font-semibold mb-3"><?= htmlspecialchars($nasa_apod['title']) ?></h3>
                    <p class="text-sm text-gray-300 line-clamp-3 max-w-2xl"><?= htmlspecialchars($nasa_apod['explanation']) ?></p>
                </div>
            </div>
        <?php elseif ($hero_post): ?>
            <!-- Fallback Post Hero -->
            <a href="/space-shuter/article/<?= htmlspecialchars($hero_post['slug']) ?>" class="relative block rounded-2xl overflow-hidden group shadow-[0_8px_30px_rgb(0,0,0,0.12)]">
                <img src="<?= htmlspecialchars($hero_post['image_url']) ?>" alt="Hero" class="w-full h-[500px] object-cover group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 p-10 w-full md:w-3/4 text-white">
                    <span class="text-xs font-bold uppercase tracking-widest text-brand-green mb-3 block">Featured Research</span>
                    <h3 class="text-3xl md:text-4xl font-semibold mb-3"><?= htmlspecialchars($hero_post['title']) ?></h3>
                    <p class="text-sm text-gray-300 line-clamp-2 max-w-2xl"><?= htmlspecialchars($hero_post['abstract']) ?></p>
                </div>
            </a>
        <?php endif; ?>
    </section>

    <!-- In the Spotlight -->
    <section>
        <div class="flex items-center justify-between mb-6 border-b border-hairline pb-2">
            <h2 class="text-2xl font-semibold text-ink tracking-tight">In the Spotlight</h2>
            <a href="/space-shuter/discover" class="text-sm font-medium text-steel hover:text-ink transition-colors">View all &rarr;</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($spotlight_posts as $post): ?>
                <div class="bg-canvas border border-hairline rounded-xl overflow-hidden group hover:shadow-md transition-all flex flex-col">
                    <div class="h-48 overflow-hidden relative">
                        <img src="<?= htmlspecialchars($post['image_url']) ?>" alt="Cover" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute top-3 left-3 bg-canvas/90 backdrop-blur text-ink text-[10px] font-bold uppercase px-2 py-1 rounded">Spotlight</div>
                    </div>
                    <div class="p-5 flex flex-col flex-1">
                        <h3 class="text-lg font-semibold text-ink mb-2 leading-snug hover:text-brand-green-deep transition-colors">
                            <a href="/space-shuter/article/<?= htmlspecialchars($post['slug']) ?>"><?= htmlspecialchars($post['title']) ?></a>
                        </h3>
                        <p class="text-sm text-slate line-clamp-2"><?= htmlspecialchars($post['abstract']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Recommended & Trending -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        <!-- Recommended -->
        <section class="lg:col-span-2">
            <h2 class="text-2xl font-semibold text-ink tracking-tight mb-6 border-b border-hairline pb-2">Recommended</h2>
            <div class="space-y-6">
                <?php foreach ($recommended_posts as $post): ?>
                    <div class="flex flex-col sm:flex-row gap-5 group">
                        <div class="w-full sm:w-48 h-32 shrink-0 rounded-lg overflow-hidden relative border border-hairline">
                            <img src="<?= htmlspecialchars($post['image_url']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="flex flex-col justify-center">
                            <span class="text-[11px] font-semibold text-brand-green uppercase tracking-wider mb-1">Recommended for you</span>
                            <h3 class="text-lg font-medium text-ink leading-snug mb-2 hover:underline">
                                <a href="/space-shuter/article/<?= htmlspecialchars($post['slug']) ?>"><?= htmlspecialchars($post['title']) ?></a>
                            </h3>
                            <p class="text-sm text-slate line-clamp-2"><?= htmlspecialchars($post['abstract']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Trending -->
        <section class="lg:col-span-1">
            <h2 class="text-2xl font-semibold text-ink tracking-tight mb-6 border-b border-hairline pb-2">More Trending</h2>
            <div class="space-y-6">
                <?php $rank = 1; foreach ($trending_posts as $post): ?>
                    <div class="flex gap-4 group">
                        <div class="text-3xl font-bold text-hairline group-hover:text-steel transition-colors">
                            <?= sprintf('%02d', $rank++) ?>
                        </div>
                        <div>
                            <h3 class="text-base font-medium text-ink leading-snug mb-1 hover:text-brand-green transition-colors">
                                <a href="/space-shuter/article/<?= htmlspecialchars($post['slug']) ?>"><?= htmlspecialchars($post['title']) ?></a>
                            </h3>
                            <span class="text-xs text-steel"><?= date('M d, Y', strtotime($post['publish_date'])) ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <!-- Euclid specific mention box -->
            <div class="mt-8 bg-surface border border-hairline p-6 rounded-xl">
                <span class="text-xs font-bold uppercase tracking-widest text-brand-error mb-2 block">Breaking</span>
                <h4 class="text-lg font-semibold text-ink mb-2">Euclid's view of our galaxy's bulge</h4>
                <p class="text-sm text-slate mb-4">Discover the latest dark universe telemetry received from the ESA Euclid mission.</p>
                <a href="/space-shuter/discover" class="text-sm font-medium text-brand-error hover:underline">Read full report &rarr;</a>
            </div>
        </section>
    </div>

</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
