<?php
// pages/public/discover.php
$page_title = 'The Observatory | Space Shutter';
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../services/DatabaseService.php';

try {
    $db = DatabaseService::getConnection();
    // Fetch latest 9 published posts for discover
    $stmt = $db->query("SELECT title, slug, abstract, image_url, publish_date FROM posts WHERE status = 'published' ORDER BY created_at DESC LIMIT 9");
    $posts = $stmt->fetchAll();
} catch (Exception $e) {
    $posts = [];
}

// Generate random luxury prices for UI purposes
function getReservePrice() {
    $prices = ['$45,000', '$28,000', '$15,000', '$120,000', '$85,000'];
    return $prices[array_rand($prices)];
}
?>

<main class="pt-40 pb-24 px-8 max-w-7xl mx-auto min-h-[90vh] relative">
    <!-- Starry background overlay -->
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-20 pointer-events-none"></div>

    <div class="text-center mb-20 relative z-10">
        <h1 class="text-5xl font-serif font-bold text-white uppercase tracking-widest mb-6">The Observatory</h1>
        <p class="text-gray-400 font-light tracking-wide max-w-2xl mx-auto">Experience the cosmos through exclusive live events, celestial phenomena, and immersive deep-space intelligence.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 relative z-10">
        <?php if (empty($posts)): ?>
            <div class="col-span-full bg-surface-soft border border-white/5 rounded-xl p-12 text-center text-gray-500">
                The observatory is currently recalibrating its lenses. Please return shortly.
            </div>
        <?php else: ?>
            <?php foreach ($posts as $post): ?>
                <div class="bg-surface border border-white/5 rounded-xl overflow-hidden group hover:border-white/10 transition-all shadow-2xl flex flex-col h-full relative">
                    <!-- Featured Event Tag -->
                    <div class="absolute top-4 right-4 z-10 bg-brand-purple text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full shadow-[0_0_10px_rgba(126,34,206,0.5)]">
                        Event
                    </div>

                    <?php if ($post['image_url']): ?>
                        <div class="h-56 w-full overflow-hidden bg-[#0a0a0f] relative">
                            <img src="<?= htmlspecialchars($post['image_url']) ?>" alt="Cosmic Event" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-[10s]">
                            <div class="absolute inset-0 bg-gradient-to-t from-surface to-transparent"></div>
                        </div>
                    <?php else: ?>
                        <div class="h-56 w-full bg-[#0a0a0f] flex items-center justify-center border-b border-white/5">
                            <svg class="w-12 h-12 text-white/10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                        </div>
                    <?php endif; ?>
                    
                    <div class="p-8 flex flex-col flex-1 -mt-10 relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-serif font-bold text-white uppercase tracking-wide group-hover:text-brand-gold transition-colors line-clamp-2"><?= htmlspecialchars($post['title']) ?></h3>
                        </div>
                        
                        <div class="text-[10px] text-gray-500 uppercase tracking-widest text-right w-full block mb-4 pb-4 border-b border-white/10">
                            Date<br/>
                            <span class="text-sm text-gray-300"><?= date('F j, Y', strtotime($post['publish_date'] ?? date('Y-m-d'))) ?></span>
                        </div>
                        
                        <p class="text-sm text-gray-400 line-clamp-3 mb-8 font-light flex-1"><?= htmlspecialchars($post['abstract']) ?></p>
                        
                        <div class="flex items-center justify-between mt-auto">
                            <span class="text-brand-gold font-bold text-sm tracking-wider"><?= getReservePrice() ?> <span class="text-[10px] text-gray-500 font-normal lowercase tracking-normal">per guest</span></span>
                            <a href="/space-shuter/article/<?= htmlspecialchars($post['slug']) ?>" class="bg-brand-purple text-white text-xs px-5 py-2.5 rounded font-semibold transition-all hover:bg-brand-purple-deep shadow-[0_0_10px_rgba(126,34,206,0.2)]">Reserve</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
