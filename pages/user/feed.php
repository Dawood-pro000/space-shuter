<?php
// pages/user/feed.php
$page_title = 'Cosmic Feed | Space Shutter';
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../services/DatabaseService.php';

$user_id = $_SESSION['user_id'];
$db = DatabaseService::getConnection();

// Fetch latest posts (Up to 30 articles)
$stmt = $db->query("SELECT title, slug, abstract, image_url, publish_date FROM posts WHERE status = 'published' ORDER BY created_at DESC LIMIT 30");
$all_posts = $stmt->fetchAll();

// Divide into 10 categories (3 articles each)
$categories = [
    "Deep Space Exploration",
    "Orbital Infrastructure",
    "Lunar Colonization",
    "Martian Habitats",
    "Astrobiology Discoveries",
    "Quantum Propulsion",
    "Interstellar Travel",
    "Exoplanet Studies",
    "Zero-Gravity Engineering",
    "Cosmic Phenomenon"
];

$categorized_posts = [];
$chunk_size = 3;
$chunks = array_chunk($all_posts, $chunk_size);

foreach ($chunks as $index => $chunk) {
    if (isset($categories[$index])) {
        $categorized_posts[$categories[$index]] = $chunk;
    }
}
?>

<main class="pt-32 pb-24 px-8 min-h-[90vh] max-w-[1400px] mx-auto relative">
    <!-- Starry background overlay -->
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-10 pointer-events-none"></div>

    <div class="relative z-10 mb-16 text-center">
        <h1 class="text-4xl md:text-5xl font-serif font-bold text-white uppercase tracking-widest drop-shadow-md mb-4">Cosmic Feed</h1>
        <p class="text-gray-400 font-light tracking-wide max-w-2xl mx-auto">Your personalized stream of classified deep-space intelligence and aerospace research, curated for the elite.</p>
    </div>

    <div class="relative z-10 space-y-20">
        <?php if (empty($categorized_posts)): ?>
            <div class="bg-surface-soft border border-white/5 rounded-xl p-12 text-center text-gray-500">
                Awaiting telemetry data from the outer sectors.
            </div>
        <?php else: ?>
            <?php foreach ($categorized_posts as $category_name => $posts): ?>
                <section>
                    <!-- Category Header -->
                    <div class="flex items-center justify-between mb-8 pb-4 border-b border-white/10">
                        <h2 class="text-2xl font-serif font-bold text-brand-gold uppercase tracking-wider"><?= htmlspecialchars($category_name) ?></h2>
                        <span class="text-xs text-gray-500 uppercase tracking-widest font-bold"><?= count($posts) ?> Articles</span>
                    </div>

                    <!-- Category Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <?php foreach ($posts as $post): ?>
                            <a href="/space-shuter/article/<?= htmlspecialchars($post['slug']) ?>" class="group bg-surface border border-white/5 rounded-xl overflow-hidden hover:border-white/20 transition-all shadow-xl flex flex-col h-full relative">
                                <?php if ($post['image_url']): ?>
                                    <div class="w-full h-48 overflow-hidden bg-[#0a0a0f] relative">
                                        <img src="<?= htmlspecialchars($post['image_url']) ?>" alt="Thumbnail" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-[8s] ease-out opacity-80 group-hover:opacity-100">
                                        <div class="absolute inset-0 bg-gradient-to-t from-surface to-transparent"></div>
                                    </div>
                                <?php else: ?>
                                    <div class="w-full h-48 bg-[#0a0a0f] flex items-center justify-center border-b border-white/5">
                                        <svg class="w-8 h-8 text-white/10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="p-6 flex flex-col flex-1 relative z-10 -mt-6 bg-surface/90 backdrop-blur-sm mx-4 mb-4 rounded-lg border border-white/5 shadow-lg">
                                    <div class="flex items-center justify-between mb-3">
                                        <div class="text-[9px] font-bold text-brand-purple uppercase tracking-widest">Intelligence</div>
                                        <span class="text-[10px] text-gray-500 uppercase tracking-wider"><?= date('M d, Y', strtotime($post['publish_date'] ?? date('Y-m-d'))) ?></span>
                                    </div>
                                    <h3 class="text-base font-serif font-bold text-white leading-snug mb-3 group-hover:text-brand-gold transition-colors line-clamp-2">
                                        <?= htmlspecialchars($post['title']) ?>
                                    </h3>
                                    <p class="text-xs text-gray-400 line-clamp-2 mb-4 flex-1 font-light leading-relaxed"><?= htmlspecialchars($post['abstract']) ?></p>
                                    
                                    <div class="mt-auto pt-4 border-t border-white/5 text-right">
                                        <span class="text-xs font-semibold text-white uppercase tracking-widest group-hover:text-brand-purple transition-colors flex items-center justify-end gap-2">
                                            Read Report <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
