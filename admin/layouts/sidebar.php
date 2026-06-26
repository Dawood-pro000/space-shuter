<?php
// admin/layouts/sidebar.php

$current_page = basename($_SERVER['PHP_SELF']);

// Only run if $db is available for the pending posts count
$pendingPosts = 0;
if (isset($db)) {
    try {
        $pendingPosts = $db->query("SELECT COUNT(*) FROM posts WHERE status IN ('draft', 'pending')")->fetchColumn();
    } catch(Exception $e) { }
}

function nav_class($page_name, $current_page) {
    if ($page_name === $current_page) {
        return "block px-3 py-2 text-sm font-medium text-ink bg-surface rounded-md border border-hairline";
    }
    return "block px-3 py-2 text-sm text-steel hover:text-ink hover:bg-surface/50 rounded-md transition-colors";
}
?>

<aside class="col-span-1 lg:col-span-1 border-r border-hairline pr-6 hidden lg:block">
    <div class="mb-6 flex items-center gap-2">
        <a href="/space-shuter/admin" class="text-xs text-steel hover:text-white bg-white/5 px-3 py-1.5 rounded-lg border border-white/10 transition-colors flex items-center gap-1">
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            Dashboard
        </a>
    </div>

    <div class="text-[11px] font-semibold uppercase tracking-[0.5px] text-steel mb-4 px-2">Mission Control</div>
    <div class="space-y-1 mb-8">
        <a href="/space-shuter/admin" class="<?= nav_class('dashboard.php', $current_page) ?>">Overview</a>
        <a href="/space-shuter/admin/posts" class="<?= nav_class('posts.php', $current_page) ?> flex justify-between items-center">
            Content <span class="bg-hairline text-ink text-[10px] px-2 py-0.5 rounded-full"><?= $pendingPosts ?></span>
        </a>
        <a href="/space-shuter/admin/users" class="<?= nav_class('users.php', $current_page) ?>">Users</a>
        <a href="/space-shuter/admin/subscriptions" class="<?= nav_class('subscriptions.php', $current_page) ?>">Subscriptions</a>
    </div>

    <div class="text-[11px] font-semibold uppercase tracking-[0.5px] text-steel mb-4 px-2">Settings</div>
    <div class="space-y-1">
        <a href="/space-shuter/admin/settings" class="<?= nav_class('settings.php', $current_page) ?>">Configuration</a>
        <a href="/space-shuter/admin/ai" class="<?= nav_class('ai-control.php', $current_page) ?> flex items-center gap-2"><svg class="w-4 h-4 text-brand-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg> Fetch Content</a>
    </div>
</aside>
