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

<main class="pt-32 pb-24 px-8 min-h-[80vh] max-w-7xl mx-auto relative">
    <!-- Starry background overlay -->
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-10 pointer-events-none"></div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 relative z-10">
        <aside class="col-span-1 border-r border-white/10 pr-6 hidden lg:block">
            <div class="text-[10px] font-bold uppercase tracking-widest text-brand-purple mb-4 px-2">Your Dashboard</div>
            <div class="space-y-2 mb-8">
                <a href="/space-shuter/feed" class="block px-4 py-3 text-sm text-gray-400 hover:text-white hover:bg-white/5 rounded-lg transition-colors border border-transparent hover:border-white/10">Space Feed</a>
                <a href="/space-shuter/study-planner" class="block px-4 py-3 text-sm text-gray-400 hover:text-white hover:bg-white/5 rounded-lg transition-colors border border-transparent hover:border-white/10">Study Planner</a>
                <a href="/space-shuter/library" class="block px-4 py-3 text-sm font-bold text-white bg-brand-purple/20 rounded-lg border border-brand-purple/50 shadow-[0_0_15px_rgba(126,34,206,0.1)]">My Library</a>
                <a href="/space-shuter/saved" class="block px-4 py-3 text-sm text-gray-400 hover:text-white hover:bg-white/5 rounded-lg transition-colors border border-transparent hover:border-white/10">Saved Bookmarks</a>
                <a href="/space-shuter/subscription" class="block px-4 py-3 text-sm text-gray-400 hover:text-white hover:bg-white/5 rounded-lg transition-colors border border-transparent hover:border-white/10">My Subscription</a>
            </div>
        </aside>
        
        <div class="col-span-1 lg:col-span-3">
            <div class="mb-12">
                <h1 class="text-4xl font-serif font-bold text-white uppercase tracking-widest mb-4 drop-shadow-md">Space Library</h1>
                <p class="text-gray-400 font-light tracking-wide">Browse our complete collection of aerospace articles and books.</p>
            </div>
            
            <h2 class="text-2xl font-serif font-bold text-white mb-6 border-b border-white/10 pb-4 uppercase tracking-widest">Research Articles</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
                <?php foreach ($posts as $post): ?>
                    <div class="bg-black/40 backdrop-blur-md border border-white/10 rounded-2xl overflow-hidden hover:border-brand-purple/50 transition-all shadow-xl group flex flex-col">
                        <?php if ($post['image_url']): ?>
                            <div class="w-full h-48 overflow-hidden bg-surface shrink-0 relative">
                                <div class="absolute inset-0 bg-brand-purple/20 mix-blend-overlay z-10"></div>
                                <img src="<?= htmlspecialchars($post['image_url']) ?>" alt="Cover" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            </div>
                        <?php else: ?>
                            <div class="w-full h-48 bg-[#0a0a0f] flex items-center justify-center shrink-0 border-b border-white/5">
                                <svg class="w-10 h-10 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        <?php endif; ?>
                        <div class="p-6 flex flex-col flex-1">
                            <h3 class="text-xl font-serif font-bold text-white leading-snug mb-3">
                                <a href="/space-shuter/article/<?= htmlspecialchars($post['slug']) ?>"><?= htmlspecialchars($post['title']) ?></a>
                            </h3>
                            <p class="text-sm text-gray-400 font-light line-clamp-2 mb-6 flex-1"><?= htmlspecialchars($post['abstract']) ?></p>
                            <div class="mt-auto">
                                <a href="/space-shuter/article/<?= htmlspecialchars($post['slug']) ?>" class="text-[10px] font-bold text-brand-purple uppercase tracking-widest hover:text-white transition-colors">Read Article →</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <h2 class="text-2xl font-serif font-bold text-white mb-6 border-b border-white/10 pb-4 uppercase tracking-widest">Recommended Books</h2>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
                <?php
                // Fetch books from OpenLibrary (No API key required!)
                $books_url = "https://openlibrary.org/search.json?q=astrophysics+space+cosmos&limit=10";
                
                // Suppress errors and handle timeout for file_get_contents
                $ctx = stream_context_create(['http' => ['timeout' => 5]]);
                $books_json = @file_get_contents($books_url, false, $ctx);
                
                if ($books_json) {
                    $books_data = json_decode($books_json, true);
                    if (isset($books_data['docs'])) {
                        foreach ($books_data['docs'] as $book) {
                            $cover_id = $book['cover_i'] ?? '';
                            $cover_url = $cover_id ? "https://covers.openlibrary.org/b/id/{$cover_id}-M.jpg" : "";
                            $title = $book['title'] ?? 'Unknown Title';
                            $author = $book['author_name'][0] ?? 'Unknown Author';
                            ?>
                            <div class="bg-black/40 backdrop-blur-sm border border-white/5 rounded-xl overflow-hidden flex flex-col group hover:border-brand-gold/30 hover:-translate-y-1 transition-all">
                                <?php if ($cover_url): ?>
                                    <div class="w-full h-48 bg-[#05050a] overflow-hidden">
                                        <img src="<?= htmlspecialchars($cover_url) ?>" alt="Book Cover" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    </div>
                                <?php else: ?>
                                    <div class="w-full h-48 bg-[#0a0a0f] flex items-center justify-center border-b border-white/5">
                                        <svg class="w-8 h-8 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                    </div>
                                <?php endif; ?>
                                <div class="p-4 flex-1 flex flex-col justify-between">
                                    <h4 class="text-xs font-bold text-white line-clamp-2 mb-2 leading-relaxed"><?= htmlspecialchars($title) ?></h4>
                                    <p class="text-[10px] text-brand-gold uppercase tracking-wider line-clamp-1"><?= htmlspecialchars($author) ?></p>
                                </div>
                            </div>
                            <?php
                        }
                    }
                } else {
                    echo "<p class='col-span-full text-gray-500 text-sm'>Cosmic library archives temporarily unavailable.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
