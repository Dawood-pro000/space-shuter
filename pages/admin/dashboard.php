<?php
$page_title = 'Admin Dashboard | Space Shutter';
require_once __DIR__ . '/../../layouts/header.php';
?>

<main class="pt-32 pb-24 px-8 min-h-[80vh] max-w-6xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <aside class="col-span-1 border-r border-hairline pr-6">
            <div class="text-[11px] font-semibold uppercase tracking-[0.5px] text-steel mb-4 px-2">Navigation</div>
            <div class="space-y-1">
                <div class="px-2 py-1.5 text-sm font-medium text-ink bg-surface rounded-md">Overview</div>
            </div>
        </aside>
        <div class="col-span-3">
            <h1 class="text-3xl font-semibold text-ink tracking-tight mb-4">Admin Dashboard</h1>
            <div class="bg-canvas rounded-lg border border-hairline p-8">
                <p class="text-slate text-sm">This page is under construction.</p>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
