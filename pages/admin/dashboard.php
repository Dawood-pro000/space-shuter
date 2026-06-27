<?php
$page_title = 'Admin Dashboard | Space Shutter';
require_once __DIR__ . '/../../services/DatabaseService.php';

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: /space-shuter/auth/login');
    exit;
}

require_once __DIR__ . '/../../layouts/header.php';

$db = DatabaseService::getConnection();

// Fetch System Stats
$usersCount = $db->query("SELECT COUNT(*) FROM users")->fetchColumn();
$postsCount = $db->query("SELECT COUNT(*) FROM posts")->fetchColumn();
$pendingPosts = $db->query("SELECT COUNT(*) FROM posts WHERE status IN ('draft', 'pending')")->fetchColumn();

// Fetch Recent Users
$recentUsers = $db->query("SELECT email, role, created_at FROM users ORDER BY created_at DESC LIMIT 5")->fetchAll();
?>

<main class="pt-32 pb-24 px-8 min-h-[80vh] max-w-7xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">
        
        <!-- Admin Sidebar -->
        <?php require_once __DIR__ . '/../../admin/layouts/sidebar.php'; ?>

        <!-- Admin Content -->
        <div class="col-span-1 lg:col-span-4">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-semibold text-white tracking-tight mb-2">Command Center</h1>
                    <p class="text-gray-400 text-sm">System overview and core platform metrics.</p>
                </div>
            </div>

            <!-- Metric Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-10">
                <div class="bg-surface border border-white/10 rounded-xl p-6 shadow-2xl relative overflow-hidden">
                    <div class="absolute inset-0 bg-brand-purple/5 opacity-50"></div>
                    <div class="relative z-10 text-sm font-bold text-gray-500 uppercase tracking-widest mb-2">Total Users</div>
                    <div class="relative z-10 text-4xl font-serif font-bold text-white"><?= number_format($usersCount) ?></div>
                </div>
                <div class="bg-surface border border-white/10 rounded-xl p-6 shadow-2xl relative overflow-hidden">
                    <div class="absolute inset-0 bg-brand-gold/5 opacity-50"></div>
                    <div class="relative z-10 text-sm font-bold text-gray-500 uppercase tracking-widest mb-2">Published Posts</div>
                    <div class="relative z-10 text-4xl font-serif font-bold text-white"><?= number_format($postsCount) ?></div>
                </div>
                <div class="bg-surface border border-white/10 rounded-xl p-6 shadow-2xl relative overflow-hidden">
                    <div class="absolute inset-0 bg-red-500/5 opacity-50"></div>
                    <div class="relative z-10 text-sm font-bold text-gray-500 uppercase tracking-widest mb-2">Pending Review</div>
                    <div class="relative z-10 flex items-center justify-between">
                        <div class="text-4xl font-serif font-bold text-white"><?= number_format($pendingPosts) ?></div>
                        <?php if($pendingPosts > 0): ?>
                            <div class="w-3 h-3 rounded-full bg-red-500 shadow-[0_0_10px_rgba(239,68,68,0.8)] animate-pulse"></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Recent Activity / Users Table -->
            <div class="bg-surface border border-white/10 rounded-xl overflow-hidden shadow-2xl">
                <div class="px-6 py-5 border-b border-white/10 bg-white/5">
                    <h3 class="text-base font-semibold text-white">Recent Registrations</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-300">
                        <thead class="bg-black/50 text-xs uppercase font-semibold text-gray-500 border-b border-white/10">
                            <tr>
                                <th class="px-6 py-4">Email Address</th>
                                <th class="px-6 py-4">Role</th>
                                <th class="px-6 py-4">Date Joined</th>
                                <th class="px-6 py-4 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            <?php foreach($recentUsers as $u): ?>
                            <tr class="hover:bg-white/5 transition-colors">
                                <td class="px-6 py-4 font-medium text-white"><?= htmlspecialchars($u['email']) ?></td>
                                <td class="px-6 py-4">
                                    <?php if($u['role'] === 'admin'): ?>
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-brand-purple/20 text-brand-purple uppercase tracking-widest border border-brand-purple/20">Admin</span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-white/5 text-gray-400 uppercase tracking-widest border border-white/10">User</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 text-gray-500 text-xs"><?= date('M d, Y h:i A', strtotime($u['created_at'])) ?></td>
                                <td class="px-6 py-4 text-right">
                                    <a href="/space-shuter/admin/users" class="text-brand-purple hover:text-brand-purple-deep hover:underline font-bold text-[10px] uppercase tracking-widest">View</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
