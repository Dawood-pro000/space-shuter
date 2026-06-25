<?php
// pages/public/home.php
$page_title = 'Space Shutter | Beyond Earth, Into Infinity';
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../services/DatabaseService.php';

$db = DatabaseService::getConnection();

// Fetch latest posts to populate sections (mapped to the luxury theme)
$stmt = $db->query("SELECT title, slug, abstract, image_url, publish_date FROM posts WHERE status = 'published' ORDER BY created_at DESC LIMIT 6");
$all_posts = $stmt->fetchAll();

$voyages = array_slice($all_posts, 0, 3);
$residences = array_slice($all_posts, 3, 3);

// Generate random luxury prices and stats for UI purposes
function getRandomPrice() {
    $prices = ['$28.5M', '$75M', '$450K', '$95M', '$225M', '$450M'];
    return $prices[array_rand($prices)];
}
?>

<!-- Hero Section -->
<section class="relative pt-40 pb-32 px-8 min-h-[90vh] flex flex-col items-center justify-center text-center overflow-hidden">
    <!-- Starry background overlay -->
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-30 pointer-events-none"></div>
    
    <div class="relative z-10 max-w-5xl space-y-8">
        <h1 class="text-5xl md:text-7xl lg:text-[80px] font-serif font-bold text-white leading-tight uppercase tracking-wide drop-shadow-2xl">
            Beyond <span class="text-brand-purple">Earth</span>,<br/>
            Into <span class="text-brand-gold">Infinity</span>
        </h1>
        <p class="text-lg md:text-xl text-gray-300 max-w-3xl mx-auto font-light tracking-wide leading-relaxed">
            A hyper-luxury digital experience designed for visionaries, dreamers, and the elite few who dare to explore the cosmos. Welcome to the future of space exploration.
        </p>
        
        <div class="flex flex-col sm:flex-row items-center justify-center gap-6 pt-10">
            <a href="/space-shuter/discover" class="bg-brand-purple text-white px-10 py-4 rounded text-sm font-semibold uppercase tracking-widest hover:bg-brand-purple-deep transition-all shadow-[0_0_20px_rgba(126,34,206,0.4)] hover:shadow-[0_0_40px_rgba(126,34,206,0.8)] border border-brand-purple hover:border-white/20">
                Enter the Experience
            </a>
            <a href="#" class="bg-transparent text-white px-10 py-4 rounded text-sm font-semibold uppercase tracking-widest border border-white/30 hover:border-white hover:bg-white/5 transition-all">
                Watch Teaser
            </a>
        </div>
    </div>
    
    <!-- Subtle planetary orb effects -->
    <div class="absolute top-1/4 left-1/4 w-32 h-32 rounded-full bg-brand-purple blur-[100px] opacity-30 pointer-events-none"></div>
    <div class="absolute bottom-1/4 right-1/4 w-64 h-64 rounded-full bg-brand-gold blur-[120px] opacity-10 pointer-events-none"></div>
</section>

<!-- Private Space Voyages -->
<section class="max-w-7xl mx-auto px-8 py-24 border-t border-white/5">
    <div class="text-center mb-16">
        <h2 class="text-4xl font-serif font-bold text-white uppercase tracking-widest mb-4">Private Space Voyages</h2>
        <p class="text-gray-400 font-light tracking-wide">Embark on extraordinary journeys beyond Earth's atmosphere with our elite aerospace partners.</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <?php foreach ($voyages as $post): ?>
            <div class="bg-surface-soft border border-white/10 rounded-lg overflow-hidden group hover:border-white/20 transition-all flex flex-col h-full shadow-2xl">
                <div class="h-56 overflow-hidden relative">
                    <img src="<?= htmlspecialchars($post['image_url']) ?>" alt="Voyage" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-[10s] ease-out">
                </div>
                <div class="p-8 flex flex-col flex-1">
                    <h3 class="text-xl font-serif font-bold text-white uppercase tracking-wide mb-3 line-clamp-1">
                        <?= htmlspecialchars($post['title']) ?>
                    </h3>
                    <p class="text-sm text-gray-400 line-clamp-3 mb-8 font-light flex-1">
                        <?= htmlspecialchars($post['abstract']) ?>
                    </p>
                    <div class="flex items-center justify-between mt-auto">
                        <span class="text-brand-gold font-bold text-sm tracking-wider"><?= getRandomPrice() ?> <span class="text-xs text-gray-500 font-normal lowercase">per person</span></span>
                        <a href="/space-shuter/article/<?= htmlspecialchars($post['slug']) ?>" class="bg-brand-purple text-white text-xs px-5 py-2.5 rounded font-semibold transition-all hover:bg-brand-purple-deep shadow-[0_0_10px_rgba(126,34,206,0.2)]">Preview Journey</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <div class="text-center mt-12">
        <a href="/space-shuter/discover" class="inline-block bg-brand-purple text-white px-8 py-3 rounded text-sm font-semibold transition-all hover:bg-brand-purple-deep shadow-[0_0_15px_rgba(126,34,206,0.3)] hover:shadow-[0_0_25px_rgba(126,34,206,0.5)] border border-brand-purple hover:border-white/10">Explore All Voyages</a>
    </div>
</section>

<!-- Celestial Residences -->
<section class="max-w-7xl mx-auto px-8 py-24 border-t border-white/5 relative">
    <div class="text-center mb-16">
        <h2 class="text-4xl font-serif font-bold text-white uppercase tracking-widest mb-4">Celestial Residences</h2>
        <p class="text-gray-400 font-light tracking-wide">Exclusive properties beyond Earth — from orbital habitats to lunar villas and Martian concept homes.</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        <?php foreach ($residences as $post): ?>
            <div class="bg-surface border border-white/5 rounded-xl overflow-hidden group hover:border-white/10 transition-all shadow-2xl relative">
                <!-- Location Tag -->
                <div class="absolute top-4 left-4 z-10 bg-brand-purple text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full shadow-[0_0_10px_rgba(126,34,206,0.5)]">
                    Exclusive
                </div>
                
                <div class="h-[300px] overflow-hidden relative">
                    <img src="<?= htmlspecialchars($post['image_url']) ?>" alt="Residence" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-[15s]">
                    <div class="absolute inset-0 bg-gradient-to-t from-surface to-transparent"></div>
                    <h3 class="absolute bottom-6 left-8 right-8 text-2xl font-serif font-bold text-white uppercase tracking-wider drop-shadow-md">
                        <?= htmlspecialchars($post['title']) ?>
                    </h3>
                </div>
                
                <div class="p-8">
                    <div class="grid grid-cols-3 gap-4 mb-6 pb-6 border-b border-white/10">
                        <div>
                            <div class="text-[10px] text-gray-500 uppercase tracking-widest mb-1">Location</div>
                            <div class="text-sm text-gray-200">Mare Tranquillitatis</div>
                        </div>
                        <div>
                            <div class="text-[10px] text-gray-500 uppercase tracking-widest mb-1">Size</div>
                            <div class="text-sm text-gray-200">320 m&sup2;</div>
                        </div>
                        <div>
                            <div class="text-[10px] text-gray-500 uppercase tracking-widest mb-1">Availability</div>
                            <div class="text-sm text-brand-gold font-bold">2029</div>
                        </div>
                    </div>
                    
                    <p class="text-sm text-gray-400 font-light line-clamp-2 mb-8">
                        <?= htmlspecialchars($post['abstract']) ?>
                    </p>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-brand-gold font-bold text-lg tracking-wider"><?= getRandomPrice() ?></span>
                        <a href="/space-shuter/article/<?= htmlspecialchars($post['slug']) ?>" class="bg-brand-purple/20 border border-brand-purple text-white text-xs uppercase tracking-wider px-6 py-2.5 rounded font-semibold transition-all hover:bg-brand-purple shadow-[0_0_10px_rgba(126,34,206,0.2)]">Virtual Tour</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <div class="text-center mt-16">
        <a href="/space-shuter/planet" class="inline-block bg-surface-soft border border-brand-purple/50 text-white px-8 py-3 rounded text-sm font-semibold transition-all hover:bg-brand-purple shadow-[0_0_15px_rgba(126,34,206,0.1)] hover:shadow-[0_0_25px_rgba(126,34,206,0.3)]">Explore All Properties</a>
    </div>
</section>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
