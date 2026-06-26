<?php
$page_title = 'Manage Users | Space Shutter';
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../services/DatabaseService.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: /space-shuter/auth/login');
    exit;
}

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

<main class="pt-32 pb-24 px-8 min-h-[80vh] max-w-7xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">
        <?php require_once __DIR__ . '/../../admin/layouts/sidebar.php'; ?>
        <div class="col-span-1 lg:col-span-4">
            <h1 class="text-3xl font-semibold text-white tracking-tight mb-4">Manage Users</h1>
            
            <?php if (isset($message)): ?>
                <div class="mb-6 p-4 bg-green-500/10 border border-green-500/20 rounded-md text-green-400 text-sm font-medium">
                    <?= htmlspecialchars($message) ?>
                </div>
            <?php endif; ?>

            <div class="bg-surface border border-white/10 rounded-xl overflow-hidden shadow-2xl">
                <div class="px-6 py-5 border-b border-white/10 bg-white/5 flex justify-between items-center">
                    <h3 class="text-base font-semibold text-white">Registered Accounts</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-black/50 text-xs uppercase font-semibold text-gray-500 border-b border-white/10">
                            <tr>
                                <th class="px-6 py-4">User</th>
                                <th class="px-6 py-4">Role</th>
                                <th class="px-6 py-4">Joined</th>
                                <th class="px-6 py-4 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-gray-300 divide-y divide-white/5">
                            <?php foreach ($users as $u): ?>
                                <tr class="hover:bg-white/5 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="font-medium text-white"><?= htmlspecialchars($u['username'] ?? 'No Username') ?></div>
                                        <div class="text-gray-500 text-xs"><?= htmlspecialchars($u['email']) ?></div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php if ($u['role'] === 'admin'): ?>
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-brand-purple/20 text-brand-purple uppercase tracking-widest border border-brand-purple/20">Admin</span>
                                        <?php else: ?>
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-white/5 text-gray-400 uppercase tracking-widest border border-white/10">User</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4 text-xs text-gray-500">
                                        <?= date('M d, Y', strtotime($u['created_at'])) ?>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <form method="POST" action="/space-shuter/admin/users" class="inline-block">
                                            <input type="hidden" name="user_id" value="<?= htmlspecialchars($u['id']) ?>">
                                            <?php if ($u['role'] === 'admin'): ?>
                                                <input type="hidden" name="new_role" value="user">
                                                <button type="submit" class="text-[10px] uppercase tracking-widest font-bold text-red-400 hover:text-red-300 bg-red-400/10 px-3 py-1.5 rounded transition-colors" <?= $u['email'] === $_SESSION['email'] ? 'disabled' : '' ?>>Demote</button>
                                            <?php else: ?>
                                                <input type="hidden" name="new_role" value="admin">
                                                <button type="submit" class="text-[10px] uppercase tracking-widest font-bold text-brand-gold hover:text-white bg-brand-gold/10 px-3 py-1.5 rounded transition-colors">Make Admin</button>
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
    </div>
</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
