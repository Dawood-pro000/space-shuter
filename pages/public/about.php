<?php
// pages/public/about.php
$page_title = 'About Us | Space Shutter';
require_once __DIR__ . '/../../layouts/header.php';
?>

<main class="pt-32 pb-24 px-8 max-w-3xl mx-auto min-h-[80vh]">
    <div class="mb-12 text-center">
        <div class="text-xs font-semibold text-brand-green uppercase tracking-widest mb-4">Our Mission</div>
        <h1 class="text-4xl font-semibold text-ink tracking-tight mb-6">Democratizing deep-space intelligence.</h1>
    </div>

    <div class="prose prose-slate prose-img:rounded-xl max-w-none text-slate space-y-6">
        <p class="text-lg leading-relaxed">
            Space Shutter was founded on a simple principle: aerospace telemetry, astronomical data, and complex physics shouldn't be locked behind archaic interfaces. We are building the modern infrastructure for reading and organizing space intelligence.
        </p>
        
        <h2 class="text-2xl font-semibold text-ink mt-12 mb-4">The Architecture</h2>
        <p class="leading-relaxed">
            Powered by a dual-agent Gemini pipeline, Space Shutter autonomously ingests raw data from the NASA API. Our AI architecture strips away the noise, synthesizes the facts, and formats it into dense, developer-grade reading surfaces.
        </p>

        <h2 class="text-2xl font-semibold text-ink mt-12 mb-4">Our Team</h2>
        <p class="leading-relaxed">
            We are a collective of engineers, designers, and space enthusiasts. By blending strict SaaS UI principles (inspired by Mintlify) with deep technical integrations, we ensure that every byte of data you read is accurate, clean, and beautiful.
        </p>
        
        <div class="bg-surface border border-hairline rounded-xl p-8 mt-8">
            <h3 class="text-lg font-medium text-ink mb-2">Join the mission</h3>
            <p class="text-sm text-steel mb-4">We are always looking for passionate contributors.</p>
            <a href="/space-shuter/contact" class="text-brand-green-deep font-medium hover:underline">Get in touch &rarr;</a>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
