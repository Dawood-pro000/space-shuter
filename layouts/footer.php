<?php
// layouts/footer.php
?>
    <!-- Footer -->
    <footer class="bg-canvas border-t border-hairline py-16 px-8 mt-20">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row justify-between gap-12">
            <div class="space-y-4">
                <div class="font-semibold tracking-tight text-xl text-ink">Space Shutter</div>
                <p class="text-sm text-steel">© <?= date('Y') ?> Space Shutter Systems. All rights reserved.</p>
            </div>
            <div class="flex gap-16">
                <div class="space-y-4">
                    <h4 class="text-sm font-medium text-ink">Product</h4>
                    <div class="flex flex-col gap-2 text-sm text-steel">
                        <a href="/space-shuter/discover" class="hover:text-ink transition-colors">Discover</a>
                        <a href="/space-shuter/pricing" class="hover:text-ink transition-colors">Pricing</a>
                    </div>
                </div>
                <div class="space-y-4">
                    <h4 class="text-sm font-medium text-ink">Company</h4>
                    <div class="flex flex-col gap-2 text-sm text-steel">
                        <a href="/space-shuter/about" class="hover:text-ink transition-colors">About Us</a>
                        <a href="/space-shuter/contact" class="hover:text-ink transition-colors">Contact</a>
                        <a href="/space-shuter/privacy" class="hover:text-ink transition-colors">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
