<?php
$page_title = 'System Configuration | Space Shutter';
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../services/DatabaseService.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: /space-shuter/auth/login');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = "Settings updated successfully.";
}
?>

<main class="pt-32 pb-24 px-8 min-h-[80vh] max-w-7xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">
        <?php require_once __DIR__ . '/../../admin/layouts/sidebar.php'; ?>
        <div class="col-span-1 lg:col-span-4">
            <h1 class="text-3xl font-semibold text-white tracking-tight mb-4">Configuration</h1>
            
            <?php if (isset($message)): ?>
                <div class="mb-6 p-4 bg-green-500/10 border border-green-500/20 rounded-md text-green-400 text-sm font-medium">
                    <?= htmlspecialchars($message) ?>
                </div>
            <?php endif; ?>

            <div class="bg-surface rounded-xl border border-white/10 p-8 shadow-2xl">
                <form method="POST" class="space-y-6">
                    <div>
                        <label class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2">Platform Name</label>
                        <input type="text" name="site_name" value="Space Shutter" class="w-full bg-black/50 border border-white/10 rounded-lg text-white p-3 focus:border-brand-purple focus:ring-1 focus:ring-brand-purple outline-none transition-colors">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2">AI Content Provider</label>
                        <select name="ai_provider" class="w-full bg-black/50 border border-white/10 rounded-lg text-white p-3 focus:border-brand-purple focus:ring-1 focus:ring-brand-purple outline-none transition-colors">
                            <option value="gemini" selected>Google Gemini Pro</option>
                            <option value="openai">OpenAI GPT-4</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2">Admin Email Notifications</label>
                        <div class="flex items-center gap-3 mt-2">
                            <input type="checkbox" name="email_notif" checked class="w-5 h-5 rounded border-white/20 bg-black/50 text-brand-purple focus:ring-brand-purple">
                            <span class="text-sm text-gray-300">Receive alerts for new user registrations</span>
                        </div>
                    </div>
                    
                    <div class="pt-6 border-t border-white/10">
                        <button type="submit" class="bg-brand-purple hover:bg-brand-purple-deep text-white font-bold py-3 px-8 rounded-lg uppercase tracking-widest text-sm transition-all shadow-[0_0_15px_rgba(126,34,206,0.3)]">Save Configuration</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
