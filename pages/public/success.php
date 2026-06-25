<?php
// pages/public/success.php
$page_title = 'Payment Successful | Space Shutter';
require_once __DIR__ . '/../../layouts/header.php';
?>
<main class="pt-32 pb-24 px-8 max-w-5xl mx-auto min-h-[80vh] text-center">
    <div class="mb-12">
        <h1 class="text-4xl font-semibold text-ink tracking-tight mb-4">Payment Successful!</h1>
        <p class="text-slate text-lg max-w-2xl mx-auto">Thank you for upgrading to the Commander Tier. Your journey begins now.</p>
    </div>
    
    <div class="bg-surface border border-hairline rounded-lg p-8 inline-block">
        <svg class="w-16 h-16 text-brand-green mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <p class="text-ink font-medium mb-6">Your transaction has been securely processed.</p>
        <a href="/space-shuter/" class="bg-brand-green text-primary font-medium text-sm py-2.5 px-6 rounded-lg hover:bg-brand-green-deep transition-colors inline-block">Go Home</a>
    </div>
</main>
<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
