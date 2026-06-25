<?php
$page_title = 'Manage Users | Space Shutter';
require_once __DIR__ . '/../../layouts/header.php';
?>

<?php
require_once __DIR__ . '/../../services/DatabaseService.php';
$db = DatabaseService::getConnection();

// Handle role toggle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'], $_POST['new_role'])) {
    $target_user_id = $_POST['user_id'];
    $new_role = $_POST['new_role'] === 'admin' ? 'admin' : 'user';
    
    $updateStmt = $db->prepare("UPDATE users SET role = ? WHERE id = ?");
    $updateStmt->execute([$new_role, $target_user_id]);
    $message = "User role updated successfully.";
}

$stmt = $db->query("SELECT id, email, username, role, created_at FROM users ORDER BY created_at DESC");
$users = $stmt->fetchAll();
?>
<main class="pt-32 pb-24 px-8 min-h-[80vh] max-w-6xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <aside class="col-span-1 border-r border-hairline pr-6">
            <div class="text-[11px] font-semibold uppercase tracking-[0.5px] text-steel mb-4 px-2">Admin Navigation</div>
            <div class="space-y-1">
                <a href="/space-shuter/admin" class="block px-2 py-1.5 text-sm text-steel hover:text-ink hover:bg-surface/50 rounded-md transition-colors">Dashboard</a>
                <a href="/space-shuter/admin/users" class="block px-2 py-1.5 text-sm font-medium text-ink bg-surface rounded-md">Manage Users</a>
            </div>
        </aside>
        <div class="col-span-3">
            <h1 class="text-3xl font-semibold text-ink tracking-tight mb-4">Manage Users</h1>
            
            <?php if (isset($message)): ?>
                <div class="mb-6 p-3 bg-brand-green/10 border border-brand-green/20 rounded-md text-brand-green-deep text-[14px] font-medium">
                    <?= htmlspecialchars($message) ?>
                </div>
            <?php endif; ?>

            <div class="bg-canvas rounded-lg border border-hairline overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-hairline text-xs font-medium text-steel uppercase tracking-wider bg-surface/30">
                            <th class="px-6 py-4">User</th>
                            <th class="px-6 py-4">Role</th>
                            <th class="px-6 py-4 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-ink divide-y divide-hairline">
                        <?php foreach ($users as $u): ?>
                            <tr class="hover:bg-surface/50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="font-medium"><?= htmlspecialchars($u['username'] ?? 'No Username') ?></div>
                                    <div class="text-steel text-xs"><?= htmlspecialchars($u['email']) ?></div>
                                </td>
                                <td class="px-6 py-4">
                                    <?php if ($u['role'] === 'admin'): ?>
                                        <span class="px-2 py-1 bg-primary text-on-primary rounded text-xs font-medium">Admin</span>
                                    <?php else: ?>
                                        <span class="px-2 py-1 bg-surface text-steel border border-hairline rounded text-xs font-medium">User</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <form method="POST" action="/space-shuter/admin/users" class="inline-block">
                                        <input type="hidden" name="user_id" value="<?= htmlspecialchars($u['id']) ?>">
                                        <?php if ($u['role'] === 'admin'): ?>
                                            <input type="hidden" name="new_role" value="user">
                                            <button type="submit" class="text-xs font-medium text-brand-error hover:underline" <?= $u['email'] === $_SESSION['email'] ? 'disabled' : '' ?>>Demote</button>
                                        <?php else: ?>
                                            <input type="hidden" name="new_role" value="admin">
                                            <button type="submit" class="text-xs font-medium text-brand-green-deep hover:underline">Make Admin</button>
                                        <?php endif; ?>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
