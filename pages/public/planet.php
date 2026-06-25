<?php
// pages/public/planet.php
$page_title = 'Celestial Residences | Space Shutter';
require_once __DIR__ . '/../../layouts/header.php';
?>

<main class="relative min-h-[90vh] flex flex-col items-center justify-center text-center px-8 overflow-hidden">
    <!-- Starry background overlay -->
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-30 pointer-events-none"></div>
    
    <div class="relative z-10 max-w-3xl space-y-8">
        <div class="inline-block mb-6 border border-brand-purple/50 bg-brand-purple/10 text-brand-purple px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest shadow-[0_0_15px_rgba(126,34,206,0.3)]">
            Coming Soon
        </div>
        
        <h1 class="text-4xl md:text-6xl font-serif font-bold text-white uppercase tracking-widest drop-shadow-lg mb-6">
            Celestial <span class="text-brand-purple">Residences</span>
        </h1>
        
        <p class="text-lg text-gray-400 font-light tracking-wide leading-relaxed max-w-2xl mx-auto">
            Our exclusive collection of orbital habitats, lunar villas, and Martian concept homes is currently under construction. Prepare to secure your legacy among the stars.
        </p>
        
        <div class="pt-10">
            <a href="/space-shuter/" class="text-brand-gold font-semibold uppercase tracking-widest text-sm hover:text-white transition-colors border-b border-brand-gold/30 hover:border-white pb-1">
                Return to Earth
            </a>
        </div>
    </div>
    
    <!-- Subtle planetary orb effect -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] rounded-full bg-brand-purple blur-[150px] opacity-10 pointer-events-none"></div>
</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
