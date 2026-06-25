<?php
require_once __DIR__ . '/../../services/DatabaseService.php';

$slug = $_GET['slug'] ?? '';

$db = DatabaseService::getConnection();
$stmt = $db->prepare("SELECT * FROM posts WHERE slug = ? AND status = 'published'");
$stmt->execute([$slug]);
$post = $stmt->fetch();

if (!$post) {
    http_response_code(404);
    echo "Article not found.";
    exit;
}

$page_title = htmlspecialchars($post['title']) . ' | Space Shutter';
require_once __DIR__ . '/../../layouts/header.php';
?>

<main class="pt-32 pb-24 px-8 min-h-[80vh] max-w-4xl mx-auto">
    <a href="javascript:history.back()" class="text-sm font-medium text-steel hover:text-ink mb-8 inline-flex items-center gap-2">
        &larr; Back
    </a>
    
    <article class="bg-canvas border border-hairline rounded-2xl overflow-hidden shadow-sm">
        <?php if ($post['image_url']): ?>
            <div class="w-full h-[400px] overflow-hidden bg-surface">
                <img src="<?= htmlspecialchars($post['image_url']) ?>" alt="Cover" class="w-full h-full object-cover">
            </div>
        <?php endif; ?>
        
        <div class="p-10 md:p-14">
            <div class="flex items-center justify-between mb-6">
                <span class="text-xs font-semibold text-brand-green uppercase tracking-wider">Research Article</span>
                <span class="text-sm text-steel"><?= date('M d, Y', strtotime($post['publish_date'])) ?></span>
            </div>
            
            <h1 class="text-3xl md:text-4xl font-semibold text-ink leading-tight mb-6">
                <?= htmlspecialchars($post['title']) ?>
            </h1>
            
            <div class="prose prose-slate max-w-none text-slate leading-relaxed">
                <p class="text-lg font-medium text-ink mb-8"><?= htmlspecialchars($post['abstract']) ?></p>
                <?= $post['content'] // Raw HTML stored in DB ?>
                <p class="mt-8 pt-8 border-t border-hairline text-sm text-steel">
                    Information fetched directly from our knowledge base.
                </p>
            </div>
        </div>
    </article>
</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
