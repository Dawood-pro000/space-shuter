<?php
// pages/user/subscription.php
$page_title = 'My Subscription | Space Shutter';
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../services/DatabaseService.php';

$user_id = $_SESSION['user_id'];
$db = DatabaseService::getConnection();

// Fetch current subscription
$stmt = $db->prepare("SELECT plan, status, expiry_date, payment_history FROM subscriptions WHERE user_id = ? ORDER BY created_at DESC LIMIT 1");
$stmt->execute([$user_id]);
$sub = $stmt->fetch();

$current_plan = $sub ? $sub['plan'] : 'Explorer (Free)';
$status = $sub ? $sub['status'] : 'active';
$expiry = $sub ? $sub['expiry_date'] : null;
$history = $sub && $sub['payment_history'] ? json_decode($sub['payment_history'], true) : [];
?>

<main class="pt-32 pb-24 px-8 max-w-4xl mx-auto min-h-[80vh]">
    <div class="mb-10">
        <h1 class="text-3xl font-semibold text-ink tracking-tight mb-2">My Subscription</h1>
        <p class="text-slate text-sm">Manage your billing and subscription plan.</p>
    </div>

    <div class="bg-surface border border-hairline rounded-xl p-8 mb-8">
        <h2 class="text-xl font-semibold text-ink mb-4">Current Plan: <span class="text-brand-green"><?= htmlspecialchars($current_plan) ?></span></h2>
        <div class="flex items-center gap-4 mb-6">
            <span class="px-3 py-1 bg-canvas border border-hairline rounded-full text-xs font-medium text-steel uppercase tracking-wider">Status: <?= htmlspecialchars($status) ?></span>
            <?php if ($expiry): ?>
                <span class="text-sm text-slate">Expires on: <?= date('M d, Y', strtotime($expiry)) ?></span>
            <?php endif; ?>
        </div>
        
        <p class="text-sm text-slate mb-6 max-w-lg">
            <?php if ($current_plan === 'Explorer (Free)'): ?>
                You are currently on the free tier. Upgrade to unlock full access to Pexels high-res imagery, detailed NASA feeds, and unlimited study tools.
            <?php else: ?>
                Thank you for being a premium member. You have full access to all Space Shutter features.
            <?php endif; ?>
        </p>

        <div class="flex gap-4">
            <?php if ($current_plan === 'Explorer (Free)'): ?>
                <a href="/space-shuter/pricing" class="bg-brand-green text-primary px-6 py-2.5 rounded-lg text-sm font-medium hover:bg-brand-green-deep transition-colors">Upgrade Plan</a>
            <?php else: ?>
                <a href="/space-shuter/contact" class="bg-surface text-brand-error border border-hairline px-6 py-2.5 rounded-lg text-sm font-medium hover:bg-brand-error/10 transition-colors">Cancel Subscription</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="bg-canvas border border-hairline rounded-xl overflow-hidden">
        <div class="px-8 py-5 border-b border-hairline bg-surface/50">
            <h3 class="text-lg font-medium text-ink">Payment History</h3>
        </div>
        <?php if (empty($history)): ?>
            <div class="p-8 text-center text-steel text-sm">
                No payment history found.
            </div>
        <?php else: ?>
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-hairline text-xs font-medium text-steel uppercase tracking-wider bg-surface/30">
                        <th class="px-8 py-4">Date</th>
                        <th class="px-8 py-4">Amount</th>
                        <th class="px-8 py-4">Plan</th>
                        <th class="px-8 py-4">Status</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-ink divide-y divide-hairline">
                    <?php foreach ($history as $payment): ?>
                        <tr class="hover:bg-surface/50 transition-colors">
                            <td class="px-8 py-4"><?= date('M d, Y', strtotime($payment['date'])) ?></td>
                            <td class="px-8 py-4 font-mono">$<?= number_format($payment['amount'], 2) ?></td>
                            <td class="px-8 py-4"><?= htmlspecialchars($payment['plan']) ?></td>
                            <td class="px-8 py-4">
                                <span class="px-2 py-1 bg-brand-green/10 text-brand-green-deep rounded text-xs font-medium">Successful</span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
