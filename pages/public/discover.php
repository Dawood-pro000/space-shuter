<?php
// pages/public/discover.php
$page_title = 'Discover | Space Shutter';
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../services/DatabaseService.php';

try {
    $db = DatabaseService::getConnection();
    // Fetch latest 6 published posts
    $stmt = $db->query("SELECT title, slug, abstract, image_url, publish_date FROM posts WHERE status = 'published' ORDER BY created_at DESC LIMIT 6");
    $posts = $stmt->fetchAll();
} catch (Exception $e) {
    $posts = [];
}
?>

<main class="pt-32 pb-24 px-8 max-w-5xl mx-auto min-h-[80vh]">
    <div class="mb-12">
        <h1 class="text-4xl font-semibold text-ink tracking-tight mb-4">Discover the Cosmos</h1>
        <p class="text-slate text-lg max-w-2xl">Explore the latest aerospace discoveries, telemetry logs, and deep-space intelligence gathered directly from our API pipeline.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php if (empty($posts)): ?>
            <div class="col-span-full bg-surface border border-hairline rounded-lg p-8 text-center text-steel">
                No telemetry data available right now. Check back later or run the ingestion pipeline.
            </div>
        <?php else: ?>
            <?php foreach ($posts as $post): ?>
                <a href="/space-shuter/article/<?= htmlspecialchars($post['slug']) ?>" class="group bg-canvas border border-hairline rounded-xl overflow-hidden hover:shadow-[0_8px_30px_rgb(0,0,0,0.04)] transition-all flex flex-col h-full">
                    <?php if ($post['image_url']): ?>
                        <div class="h-48 w-full overflow-hidden bg-surface">
                            <img src="<?= htmlspecialchars($post['image_url']) ?>" alt="Cover" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                    <?php else: ?>
                        <div class="h-48 w-full bg-surface flex items-center justify-center border-b border-hairline">
                            <svg class="w-8 h-8 text-steel" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    <?php endif; ?>
                    <div class="p-6 flex flex-col flex-1">
                        <div class="text-xs font-semibold text-brand-green uppercase tracking-wider mb-2">Intelligence</div>
                        <h3 class="text-lg font-semibold text-ink leading-snug mb-2 group-hover:text-brand-green-deep transition-colors"><?= htmlspecialchars($post['title']) ?></h3>
                        <p class="text-sm text-slate line-clamp-3 mb-4 flex-1"><?= htmlspecialchars($post['abstract']) ?></p>
                        <div class="text-xs text-steel flex items-center justify-between mt-auto pt-4 border-t border-hairline">
                            <span><?= date('M d, Y', strtotime($post['publish_date'] ?? date('Y-m-d'))) ?></span>
                            <span class="font-medium flex items-center gap-1 group-hover:text-ink transition-colors">Read <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></span>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
