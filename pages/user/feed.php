<?php
// pages/user/feed.php
$page_title = 'Space Feed | Space Shutter';
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../services/DatabaseService.php';

$user_id = $_SESSION['user_id'];
$db = DatabaseService::getConnection();

// Fetch user stats
$stmt = $db->prepare("SELECT total_study_hours, current_streak FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user_stats = $stmt->fetch();

$study_hours = $user_stats['total_study_hours'] ?? 0;
$streak = $user_stats['current_streak'] ?? 0;

// Fetch latest posts
$stmt = $db->query("SELECT title, slug, abstract, image_url, publish_date FROM posts WHERE status = 'published' ORDER BY created_at DESC LIMIT 10");
$posts = $stmt->fetchAll();
?>

<main class="pt-32 pb-24 px-8 min-h-[80vh] max-w-7xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        
        <!-- Left Sidebar: User Stats -->
        <aside class="col-span-1 border-r border-hairline pr-6 hidden lg:block">
            <div class="text-[11px] font-semibold uppercase tracking-[0.5px] text-steel mb-4 px-2">Your Dashboard</div>
            <div class="space-y-1 mb-8">
                <a href="/space-shuter/feed" class="block px-3 py-2 text-sm font-medium text-ink bg-surface rounded-md border border-hairline">Space Feed</a>
                <a href="/space-shuter/study-planner" class="block px-3 py-2 text-sm text-steel hover:text-ink hover:bg-surface/50 rounded-md transition-colors">Study Planner</a>
                <a href="/space-shuter/library" class="block px-3 py-2 text-sm text-steel hover:text-ink hover:bg-surface/50 rounded-md transition-colors">My Library</a>
                <a href="/space-shuter/saved" class="block px-3 py-2 text-sm text-steel hover:text-ink hover:bg-surface/50 rounded-md transition-colors">Saved Bookmarks</a>
            </div>

            <div class="bg-surface border border-hairline rounded-lg p-5">
                <h4 class="text-xs font-semibold text-ink uppercase tracking-wider mb-4">Telemetry Stats</h4>
                
                <div class="mb-4">
                    <div class="text-sm text-slate mb-1">Study Hours</div>
                    <div class="text-2xl font-semibold text-ink"><?= $study_hours ?> <span class="text-sm font-normal text-steel">hrs</span></div>
                </div>
                
                <div>
                    <div class="text-sm text-slate mb-1">Current Streak</div>
                    <div class="flex items-center gap-2">
                        <div class="text-2xl font-semibold text-ink"><?= $streak ?></div>
                        <svg class="w-5 h-5 text-brand-error" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"></path></svg>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content: Feed -->
        <div class="col-span-1 lg:col-span-3">
            <h1 class="text-3xl font-semibold text-ink tracking-tight mb-2">Space Feed</h1>
            <p class="text-slate text-sm mb-8">Your personalized stream of deep-space intelligence and aerospace research.</p>

            <div class="space-y-6">
                <?php if (empty($posts)): ?>
                    <div class="bg-canvas border border-hairline rounded-lg p-8 text-center text-steel">
                        No new telemetry data available right now.
                    </div>
                <?php else: ?>
                    <?php foreach ($posts as $post): ?>
                        <div class="group bg-canvas border border-hairline rounded-xl overflow-hidden hover:shadow-[0_8px_30px_rgb(0,0,0,0.04)] transition-all flex flex-col sm:flex-row">
                            <?php if ($post['image_url']): ?>
                                <div class="w-full sm:w-64 h-48 sm:h-auto overflow-hidden bg-surface shrink-0">
                                    <img src="<?= htmlspecialchars($post['image_url']) ?>" alt="Cover" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                </div>
                            <?php else: ?>
                                <div class="w-full sm:w-64 h-48 sm:h-auto bg-surface flex items-center justify-center shrink-0 border-r border-hairline">
                                    <svg class="w-8 h-8 text-steel" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            <?php endif; ?>
                            <div class="p-6 flex flex-col flex-1">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="text-[11px] font-semibold text-brand-green uppercase tracking-wider">Research</div>
                                    <span class="text-xs text-steel"><?= date('M d, Y', strtotime($post['publish_date'] ?? date('Y-m-d'))) ?></span>
                                </div>
                                <h3 class="text-xl font-semibold text-ink leading-snug mb-2 group-hover:text-brand-green-deep transition-colors">
                                    <a href="/space-shuter/article/<?= htmlspecialchars($post['slug']) ?>"><?= htmlspecialchars($post['title']) ?></a>
                                </h3>
                                <p class="text-sm text-slate line-clamp-2 mb-4 flex-1"><?= htmlspecialchars($post['abstract']) ?></p>
                                
                                <div class="flex items-center gap-4 mt-auto">
                                    <a href="/space-shuter/article/<?= htmlspecialchars($post['slug']) ?>" class="text-sm font-medium text-ink bg-surface border border-hairline px-4 py-2 rounded-md hover:bg-hairline transition-colors">Read Article</a>
                                    <button class="text-sm text-steel hover:text-ink transition-colors flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg> Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
