<?php
// pages/admin/subscriptions.php
$page_title = 'Manage Subscriptions | Admin';
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../services/DatabaseService.php';

$db = DatabaseService::getConnection();
try {
    $stmt = $db->query("
        SELECT s.*, u.email 
        FROM public.subscriptions s
        JOIN public.users u ON s.user_id = u.id
        ORDER BY s.created_at DESC
    ");
    $subscriptions = $stmt->fetchAll();
} catch (Exception $e) {
    $subscriptions = [];
}
?>

<main class="pt-32 pb-24 px-8 max-w-7xl mx-auto min-h-[80vh]">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Admin Sidebar -->
        <?php require_once __DIR__ . '/../../admin/layouts/sidebar.php'; ?>
        
        <div class="col-span-3">
            <div class="mb-8 flex justify-between items-center">
                <h1 class="text-3xl font-semibold text-ink">Subscriptions & Payments</h1>
            </div>

    <div class="bg-surface border border-hairline rounded-lg overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-canvas border-b border-hairline">
                    <th class="py-4 px-6 text-sm font-medium text-slate uppercase tracking-wider">User</th>
                    <th class="py-4 px-6 text-sm font-medium text-slate uppercase tracking-wider">Plan</th>
                    <th class="py-4 px-6 text-sm font-medium text-slate uppercase tracking-wider">Status</th>
                    <th class="py-4 px-6 text-sm font-medium text-slate uppercase tracking-wider">Date Recorded</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($subscriptions)): ?>
                    <tr>
                        <td colspan="4" class="py-8 text-center text-slate">No payments recorded yet. They will appear here automatically when a Stripe checkout is completed.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($subscriptions as $sub): ?>
                        <tr class="border-b border-hairline hover:bg-canvas transition-colors">
                            <td class="py-4 px-6 text-ink font-medium"><?= htmlspecialchars($sub['email']) ?></td>
                            <td class="py-4 px-6 text-slate"><?= htmlspecialchars($sub['plan']) ?></td>
                            <td class="py-4 px-6">
                                <span class="px-2 py-1 bg-brand-green/10 text-brand-green-deep text-xs rounded-full font-medium border border-brand-green/20">
                                    <?= htmlspecialchars($sub['status']) ?>
                                </span>
                            </td>
                            <td class="py-4 px-6 text-slate text-sm"><?= date('M d, Y H:i', strtotime($sub['created_at'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
            </table>
        </div>
    </div>
    </div>
</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
