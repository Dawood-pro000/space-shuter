<?php
// pages/public/contact.php
$page_title = 'Contact | Space Shutter';
require_once __DIR__ . '/../../layouts/header.php';
?>

<main class="pt-32 pb-24 px-8 max-w-xl mx-auto min-h-[80vh]">
    <div class="mb-10 text-center">
        <h1 class="text-4xl font-semibold text-ink tracking-tight mb-4">Contact Us</h1>
        <p class="text-slate text-base">Have a question about our telemetry API or enterprise pricing? Drop us a message.</p>
    </div>

    <div class="bg-canvas border border-hairline rounded-xl p-8 shadow-sm">
        <form method="POST" action="" class="space-y-5">
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-ink mb-1.5">First name</label>
                    <input type="text" class="w-full bg-canvas border border-hairline rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-brand-green focus:border-transparent transition-shadow">
                </div>
                <div>
                    <label class="block text-sm font-medium text-ink mb-1.5">Last name</label>
                    <input type="text" class="w-full bg-canvas border border-hairline rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-brand-green focus:border-transparent transition-shadow">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-ink mb-1.5">Email address</label>
                <input type="email" class="w-full bg-canvas border border-hairline rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-brand-green focus:border-transparent transition-shadow">
            </div>

            <div>
                <label class="block text-sm font-medium text-ink mb-1.5">Message</label>
                <textarea rows="4" class="w-full bg-canvas border border-hairline rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-brand-green focus:border-transparent transition-shadow resize-none"></textarea>
            </div>

            <button type="button" class="w-full bg-primary text-on-primary font-medium text-sm py-2.5 rounded-lg hover:bg-charcoal transition-colors mt-2">
                Send Message
            </button>
        </form>
    </div>
</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
