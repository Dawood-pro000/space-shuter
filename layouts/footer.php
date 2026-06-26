<?php
// layouts/footer.php
?>
    <!-- Footer -->
    <footer class="bg-black border-t border-white/10 py-16 px-8 mt-20 relative z-10">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row justify-between gap-12">
            <div class="space-y-4">
                <a href="/space-shuter/" class="font-serif font-bold tracking-widest text-2xl text-white uppercase flex items-center gap-2">
                    Space <span class="text-white font-light opacity-70">Shutter</span>
                </a>
                <p class="text-sm text-gray-500 tracking-wide">© <?= date('Y') ?> Space Shutter. All rights reserved.</p>
                <p class="text-xs text-gray-600 font-light mt-2 max-w-xs">Your portal to discovering the wonders of space.</p>
            </div>
            <div class="flex gap-16">
                <div class="space-y-4">
                    <h4 class="text-sm font-semibold text-white uppercase tracking-widest">Explore</h4>
                    <div class="flex flex-col gap-3 text-sm text-gray-400 font-light">
                        <a href="/space-shuter/discover" class="hover:text-brand-gold transition-colors">Discover</a>
                        <a href="/space-shuter/planet" class="hover:text-brand-gold transition-colors">Destinations</a>
                        <a href="/space-shuter/study-planner" class="hover:text-brand-gold transition-colors">Study Planner</a>
                    </div>
                </div>
                <div class="space-y-4">
                    <h4 class="text-sm font-semibold text-white uppercase tracking-widest">Company</h4>
                    <div class="flex flex-col gap-3 text-sm text-gray-400 font-light">
                        <a href="/space-shuter/about" class="hover:text-brand-gold transition-colors">About Us</a>
                        <a href="/space-shuter/contact" class="hover:text-brand-gold transition-colors">Contact</a>
                        <a href="/space-shuter/privacy" class="hover:text-brand-gold transition-colors">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
