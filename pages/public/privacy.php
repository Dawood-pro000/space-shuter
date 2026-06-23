<?php
// pages/public/privacy.php
$page_title = 'Privacy Policy | Space Shutter';
require_once __DIR__ . '/../../layouts/header.php';
?>

<main class="pt-32 pb-24 px-8 max-w-3xl mx-auto min-h-[80vh]">
    <div class="mb-12 border-b border-hairline pb-8">
        <h1 class="text-4xl font-semibold text-ink tracking-tight mb-4">Privacy Policy</h1>
        <p class="text-slate text-sm">Last updated: June 23, 2026</p>
    </div>

    <div class="prose prose-slate max-w-none text-slate space-y-6">
        <h2 class="text-xl font-semibold text-ink">1. Information We Collect</h2>
        <p class="text-sm leading-relaxed">
            We collect information you provide directly to us, such as when you create or modify your account, request on-demand services, contact customer support, or otherwise communicate with us. This information may include: name, email, phone number, postal address, profile picture, payment method, items requested (for delivery services), delivery notes, and other information you choose to provide.
        </p>

        <h2 class="text-xl font-semibold text-ink mt-8">2. Use of Information</h2>
        <p class="text-sm leading-relaxed">
            We may use the information we collect about you to:
        </p>
        <ul class="list-disc pl-5 text-sm space-y-2 mt-2">
            <li>Provide, maintain, and improve our Services, including, for example, to facilitate payments, send receipts, provide products and services you request (and send related information), develop new features, provide customer support to Users, develop safety features, authenticate users, and send product updates and administrative messages;</li>
            <li>Perform internal operations, including, for example, to prevent fraud and abuse of our Services; to troubleshoot software bugs and operational problems; to conduct data analysis, testing, and research; and to monitor and analyze usage and activity trends;</li>
            <li>Send you communications we think will be of interest to you, including information about products, services, promotions, news, and events of Space Shutter and other companies, where permissible and according to local applicable laws.</li>
        </ul>

        <h2 class="text-xl font-semibold text-ink mt-8">3. Sharing of Information</h2>
        <p class="text-sm leading-relaxed">
            We may share the information we collect about you as described in this Statement or as described at the time of collection or sharing, including as follows:
            With third parties to provide you a service you requested through a partnership or promotional offering made by a third party or us;
            With the general public if you submit content in a public forum, such as blog comments, social media posts, or other features of our Services that are viewable by the general public.
        </p>
    </div>
</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
