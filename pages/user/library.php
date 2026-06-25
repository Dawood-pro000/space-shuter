<?php
$page_title = 'Library | Space Shutter';
require_once __DIR__ . '/../../layouts/header.php';
?>

<?php
require_once __DIR__ . '/../../services/DatabaseService.php';

$db = DatabaseService::getConnection();
$stmt = $db->query("SELECT title, slug, abstract, image_url, publish_date FROM posts WHERE status = 'published' ORDER BY created_at DESC");
$posts = $stmt->fetchAll();
?>

<main class="pt-32 pb-24 px-8 min-h-[80vh] max-w-7xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <aside class="col-span-1 border-r border-hairline pr-6 hidden lg:block">
            <div class="text-[11px] font-semibold uppercase tracking-[0.5px] text-steel mb-4 px-2">Your Dashboard</div>
            <div class="space-y-1 mb-8">
                <a href="/space-shuter/feed" class="block px-3 py-2 text-sm text-steel hover:text-ink hover:bg-surface/50 rounded-md transition-colors">Space Feed</a>
                <a href="/space-shuter/study-planner" class="block px-3 py-2 text-sm text-steel hover:text-ink hover:bg-surface/50 rounded-md transition-colors">Study Planner</a>
                <a href="/space-shuter/library" class="block px-3 py-2 text-sm font-medium text-ink bg-surface rounded-md border border-hairline">My Library</a>
                <a href="/space-shuter/saved" class="block px-3 py-2 text-sm text-steel hover:text-ink hover:bg-surface/50 rounded-md transition-colors">Saved Bookmarks</a>
                <a href="/space-shuter/subscription" class="block px-3 py-2 text-sm text-steel hover:text-ink hover:bg-surface/50 rounded-md transition-colors">My Subscription</a>
            </div>
        </aside>
        
        <div class="col-span-1 lg:col-span-3">
            <div class="mb-8">
                <h1 class="text-3xl font-semibold text-ink tracking-tight mb-2">Space Library</h1>
                <p class="text-slate text-sm">Browse our complete collection of aerospace articles and books.</p>
            </div>
            
            <h2 class="text-xl font-semibold text-ink mb-4 border-b border-hairline pb-2">Research Articles</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
                <?php foreach ($posts as $post): ?>
                    <div class="bg-canvas border border-hairline rounded-xl overflow-hidden hover:shadow-[0_8px_30px_rgb(0,0,0,0.04)] transition-all flex flex-col">
                        <?php if ($post['image_url']): ?>
                            <div class="w-full h-48 overflow-hidden bg-surface shrink-0">
                                <img src="<?= htmlspecialchars($post['image_url']) ?>" alt="Cover" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                            </div>
                        <?php else: ?>
                            <div class="w-full h-48 bg-surface flex items-center justify-center shrink-0 border-b border-hairline">
                                <svg class="w-8 h-8 text-steel" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        <?php endif; ?>
                        <div class="p-5 flex flex-col flex-1">
                            <h3 class="text-lg font-semibold text-ink leading-snug mb-2">
                                <a href="/space-shuter/article/<?= htmlspecialchars($post['slug']) ?>"><?= htmlspecialchars($post['title']) ?></a>
                            </h3>
                            <p class="text-sm text-slate line-clamp-2 mb-4 flex-1"><?= htmlspecialchars($post['abstract']) ?></p>
                            <div class="mt-auto">
                                <a href="/space-shuter/article/<?= htmlspecialchars($post['slug']) ?>" class="text-sm font-medium text-brand-green-deep hover:underline">Read Article &rarr;</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <h2 class="text-xl font-semibold text-ink mb-4 border-b border-hairline pb-2">Recommended Books (OpenLibrary)</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <?php
                // Fetch books from OpenLibrary (No API key required!)
                $books_url = "https://openlibrary.org/search.json?q=aerospace+space&limit=4";
                $books_json = @file_get_contents($books_url);
                if ($books_json) {
                    $books_data = json_decode($books_json, true);
                    if (isset($books_data['docs'])) {
                        foreach ($books_data['docs'] as $book) {
                            $cover_id = $book['cover_i'] ?? '';
                            $cover_url = $cover_id ? "https://covers.openlibrary.org/b/id/{$cover_id}-M.jpg" : "";
                            $title = $book['title'] ?? 'Unknown Title';
                            $author = $book['author_name'][0] ?? 'Unknown Author';
                            ?>
                            <div class="bg-canvas border border-hairline rounded-lg overflow-hidden flex flex-col">
                                <?php if ($cover_url): ?>
                                    <div class="w-full h-40 bg-surface">
                                        <img src="<?= htmlspecialchars($cover_url) ?>" alt="Book Cover" class="w-full h-full object-cover">
                                    </div>
                                <?php else: ?>
                                    <div class="w-full h-40 bg-surface flex items-center justify-center border-b border-hairline">
                                        <svg class="w-6 h-6 text-steel" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                    </div>
                                <?php endif; ?>
                                <div class="p-4 flex-1 flex flex-col">
                                    <h4 class="text-sm font-semibold text-ink line-clamp-2 mb-1"><?= htmlspecialchars($title) ?></h4>
                                    <p class="text-xs text-steel line-clamp-1"><?= htmlspecialchars($author) ?></p>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
