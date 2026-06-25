<?php
// pages/user/profile.php
$page_title = 'My Profile | Space Shutter';
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../services/DatabaseService.php';

$user_id = $_SESSION['user_id'];
$db = DatabaseService::getConnection();

// Fetch user data
$stmt = $db->prepare("SELECT email, username, role, total_study_hours FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

$displayName = !empty($user['username']) ? $user['username'] : explode('@', $user['email'])[0];
$studyHours = $user['total_study_hours'] ?? 0;
?>

<main class="pt-32 pb-24 px-8 min-h-[90vh] max-w-4xl mx-auto relative">
    <!-- Starry background overlay -->
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-10 pointer-events-none"></div>

    <div class="relative z-10 bg-[#111116] border border-white/10 rounded-2xl p-8 md:p-12 shadow-2xl overflow-hidden">
        <!-- Glow effect -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-brand-purple/20 blur-[100px] rounded-full pointer-events-none"></div>

        <h1 class="text-3xl font-serif font-bold text-white uppercase tracking-widest mb-8 border-b border-white/10 pb-6 drop-shadow-md">Command Center</h1>
        
        <div class="flex flex-col md:flex-row items-start md:items-center gap-8 mb-12">
            <div class="relative group cursor-pointer">
                <div class="w-28 h-28 rounded-full bg-brand-purple text-white flex items-center justify-center text-5xl font-serif font-bold uppercase shadow-[0_0_30px_rgba(126,34,206,0.5)] z-10 relative">
                    <?= substr($displayName, 0, 1) ?>
                </div>
                <div class="absolute inset-0 rounded-full border border-white/20 scale-110 group-hover:scale-125 transition-transform duration-500"></div>
                <div class="absolute inset-0 rounded-full border border-brand-purple/50 scale-125 group-hover:scale-150 transition-transform duration-700"></div>
            </div>
            
            <div class="flex-1">
                <h2 class="text-3xl font-serif font-bold text-white tracking-wide mb-1"><?= htmlspecialchars($displayName) ?></h2>
                <p class="text-gray-400 font-light mb-4"><?= htmlspecialchars($user['email']) ?></p>
                <div class="flex gap-4">
                    <div class="inline-block text-[10px] font-bold uppercase tracking-widest text-brand-gold bg-brand-gold/10 px-3 py-1.5 rounded border border-brand-gold/20">
                        <?= htmlspecialchars($user['role']) ?> Clearance
                    </div>
                    <div class="inline-block text-[10px] font-bold uppercase tracking-widest text-brand-purple bg-brand-purple/10 px-3 py-1.5 rounded border border-brand-purple/20">
                        <?= $studyHours ?> Logged Hours
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Form section -->
            <form class="space-y-6">
                <div>
                    <label class="block text-xs uppercase tracking-widest text-gray-500 font-bold mb-2">Display Name</label>
                    <input type="text" value="<?= htmlspecialchars($user['username'] ?? '') ?>" class="w-full bg-[#05050a] border border-white/10 rounded px-4 py-3 text-white focus:outline-none focus:border-brand-purple transition-colors shadow-inner font-light" placeholder="Enter designation">
                </div>
                <div>
                    <label class="block text-xs uppercase tracking-widest text-gray-500 font-bold mb-2">Comlink (Email)</label>
                    <input type="email" value="<?= htmlspecialchars($user['email']) ?>" disabled class="w-full bg-[#05050a]/50 border border-white/5 rounded px-4 py-3 text-gray-600 cursor-not-allowed font-light">
                    <p class="text-[10px] text-brand-gold mt-2 uppercase tracking-wide">Comlink cannot be altered post-registration.</p>
                </div>
                
                <div class="pt-6 border-t border-white/10">
                    <button type="button" class="bg-brand-purple text-white uppercase tracking-widest font-bold text-xs px-8 py-3 rounded hover:bg-brand-purple-deep transition-all shadow-[0_0_15px_rgba(126,34,206,0.3)] hover:shadow-[0_0_25px_rgba(126,34,206,0.5)]">
                        Update Telemetry
                    </button>
                </div>
            </form>

            <!-- Quick Links / Status -->
            <div class="space-y-4">
                <h3 class="text-xs uppercase tracking-widest text-gray-500 font-bold mb-4 border-b border-white/5 pb-2">Access Protocols</h3>
                
                <a href="/space-shuter/library" class="flex items-center justify-between p-4 bg-surface border border-white/5 rounded group hover:border-white/20 transition-all">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        <span class="text-sm font-medium text-gray-300 group-hover:text-white transition-colors">My Library</span>
                    </div>
                    <svg class="w-4 h-4 text-gray-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>

                <a href="/space-shuter/subscription" class="flex items-center justify-between p-4 bg-surface border border-white/5 rounded group hover:border-brand-gold/30 transition-all">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-brand-gold/50 group-hover:text-brand-gold transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                        <span class="text-sm font-medium text-gray-300 group-hover:text-white transition-colors">Payments & Billing</span>
                    </div>
                    <span class="text-[9px] font-bold uppercase tracking-widest text-brand-gold">Active</span>
                </a>

            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
