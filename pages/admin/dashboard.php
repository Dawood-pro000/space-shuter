<?php
// pages/admin/dashboard.php
$page_title = 'Admin Dashboard | Space Shutter';
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../services/DatabaseService.php';

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
        <aside class="col-span-1 lg:col-span-1 border-r border-hairline pr-6 hidden lg:block">
            <div class="text-[11px] font-semibold uppercase tracking-[0.5px] text-steel mb-4 px-2">Mission Control</div>
            <div class="space-y-1 mb-8">
                <a href="/space-shuter/admin" class="block px-3 py-2 text-sm font-medium text-ink bg-surface rounded-md border border-hairline">Overview</a>
                <a href="/space-shuter/admin/posts" class="block px-3 py-2 text-sm text-steel hover:text-ink hover:bg-surface/50 rounded-md transition-colors flex justify-between items-center">
                    Content <span class="bg-hairline text-ink text-[10px] px-2 py-0.5 rounded-full"><?= $pendingPosts ?></span>
                </a>
                <a href="/space-shuter/admin/users" class="block px-3 py-2 text-sm text-steel hover:text-ink hover:bg-surface/50 rounded-md transition-colors">Users</a>
                <a href="/space-shuter/admin/subscriptions" class="block px-3 py-2 text-sm text-steel hover:text-ink hover:bg-surface/50 rounded-md transition-colors">Subscriptions</a>
            </div>

            <div class="text-[11px] font-semibold uppercase tracking-[0.5px] text-steel mb-4 px-2">Settings</div>
            <div class="space-y-1">
                <a href="/space-shuter/admin/settings" class="block px-3 py-2 text-sm text-steel hover:text-ink hover:bg-surface/50 rounded-md transition-colors">Configuration</a>
                <a href="/space-shuter/admin/ai" class="block px-3 py-2 text-sm text-steel hover:text-ink hover:bg-surface/50 rounded-md transition-colors flex items-center gap-2"><svg class="w-4 h-4 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg> AI Pipeline</a>
            </div>
        </aside>

        <!-- Admin Content -->
        <div class="col-span-1 lg:col-span-4">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-semibold text-ink tracking-tight mb-2">Command Center</h1>
                    <p class="text-slate text-sm">System overview and core platform metrics.</p>
                </div>
                <button class="bg-primary text-on-primary text-sm font-medium px-4 py-2 rounded-lg hover:bg-charcoal transition-colors">Generate Report</button>
            </div>

            <!-- Metric Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-10">
                <div class="bg-canvas border border-hairline rounded-xl p-6 shadow-sm">
                    <div class="text-sm font-medium text-slate mb-2">Total Users</div>
                    <div class="text-3xl font-semibold text-ink"><?= number_format($usersCount) ?></div>
                </div>
                <div class="bg-canvas border border-hairline rounded-xl p-6 shadow-sm">
                    <div class="text-sm font-medium text-slate mb-2">Published Posts</div>
                    <div class="text-3xl font-semibold text-ink"><?= number_format($postsCount) ?></div>
                </div>
                <div class="bg-canvas border border-hairline rounded-xl p-6 shadow-sm">
                    <div class="text-sm font-medium text-slate mb-2">Pending Review</div>
                    <div class="flex items-center justify-between">
                        <div class="text-3xl font-semibold text-ink"><?= number_format($pendingPosts) ?></div>
                        <?php if($pendingPosts > 0): ?>
                            <div class="w-2 h-2 rounded-full bg-brand-error animate-pulse"></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Recent Activity / Users Table -->
            <div class="bg-canvas border border-hairline rounded-xl overflow-hidden shadow-sm">
                <div class="px-6 py-5 border-b border-hairline bg-surface/50">
                    <h3 class="text-base font-semibold text-ink">Recent Registrations</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-slate">
                        <thead class="bg-surface text-xs uppercase font-semibold text-steel border-b border-hairline">
                            <tr>
                                <th class="px-6 py-3">Email Address</th>
                                <th class="px-6 py-3">Role</th>
                                <th class="px-6 py-3">Date Joined</th>
                                <th class="px-6 py-3 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-hairline">
                            <?php foreach($recentUsers as $u): ?>
                            <tr class="hover:bg-surface/50 transition-colors">
                                <td class="px-6 py-4 font-medium text-ink"><?= htmlspecialchars($u['email']) ?></td>
                                <td class="px-6 py-4">
                                    <?php if($u['role'] === 'admin'): ?>
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium bg-brand-green/10 text-brand-green-deep uppercase tracking-wider">Admin</span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium bg-surface text-steel border border-hairline uppercase tracking-wider">User</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4"><?= date('M d, Y h:i A', strtotime($u['created_at'])) ?></td>
                                <td class="px-6 py-4 text-right">
                                    <a href="#" class="text-brand-green-deep hover:underline font-medium">View</a>
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
