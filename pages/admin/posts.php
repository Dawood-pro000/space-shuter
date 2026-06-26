<?php
$page_title = 'Manage Posts | Space Shutter';
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../services/DatabaseService.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: /space-shuter/auth/login');
    exit;
}

$db = DatabaseService::getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_post_id'])) {
    $stmt = $db->prepare("DELETE FROM posts WHERE id = :id");
    $stmt->execute(['id' => $_POST['delete_post_id']]);
    header('Location: /space-shuter/admin/posts');
    exit;
}

$posts = $db->query("SELECT id, title, category, status, created_at FROM posts ORDER BY created_at DESC")->fetchAll();
?>

<main class="pt-32 pb-24 px-8 min-h-[80vh] max-w-7xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">
        <?php require_once __DIR__ . '/../../admin/layouts/sidebar.php'; ?>
        <div class="col-span-1 lg:col-span-4">
            <h1 class="text-3xl font-semibold text-white tracking-tight mb-4">Manage Posts</h1>
            
            <div class="bg-surface border border-white/10 rounded-xl overflow-hidden shadow-2xl">
                <div class="px-6 py-5 border-b border-white/10 bg-white/5 flex justify-between items-center">
                    <h3 class="text-base font-semibold text-white">All Publications</h3>
                    <a href="/space-shuter/admin/ai" class="bg-brand-purple hover:bg-brand-purple-deep text-white text-xs font-bold px-4 py-2 rounded uppercase tracking-wider transition-all">Fetch New</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-300">
                        <thead class="bg-black/50 text-xs uppercase font-semibold text-gray-500 border-b border-white/10">
                            <tr>
                                <th class="px-6 py-4">Title</th>
                                <th class="px-6 py-4">Category</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4">Date</th>
                                <th class="px-6 py-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            <?php foreach($posts as $p): ?>
                            <tr class="hover:bg-white/5 transition-colors">
                                <td class="px-6 py-4 font-medium text-white max-w-xs truncate"><?= htmlspecialchars($p['title']) ?></td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-white/10 text-gray-300 uppercase tracking-widest border border-white/10">
                                        <?= htmlspecialchars($p['category'] ?? 'General') ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <?php if($p['status'] === 'published'): ?>
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-green-500/20 text-green-400 uppercase tracking-widest">Published</span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-yellow-500/20 text-yellow-400 uppercase tracking-widest"><?= htmlspecialchars($p['status']) ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 text-gray-500 text-xs"><?= date('M d, Y', strtotime($p['created_at'])) ?></td>
                                <td class="px-6 py-4 text-right">
                                    <form method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                        <input type="hidden" name="delete_post_id" value="<?= $p['id'] ?>">
                                        <button type="submit" class="text-red-400 hover:text-red-300 font-medium text-xs uppercase tracking-widest bg-red-400/10 px-3 py-1.5 rounded transition-colors">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php if(empty($posts)): ?>
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-500">No posts found. Use 'Fetch New' to add content.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
