<?php
// pages/user/study-planner.php
$page_title = 'Study Planner | Space Shutter';
require_once __DIR__ . '/../../layouts/header.php';
?>

<main class="pt-32 pb-24 px-8 min-h-[80vh] max-w-6xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <aside class="col-span-1 border-r border-hairline pr-6 hidden md:block">
            <div class="text-[11px] font-semibold uppercase tracking-[0.5px] text-steel mb-4 px-2">Your Dashboard</div>
            <div class="space-y-1 mb-8">
                <a href="/space-shuter/feed" class="block px-3 py-2 text-sm text-steel hover:text-ink hover:bg-surface/50 rounded-md transition-colors">Space Feed</a>
                <a href="/space-shuter/study-planner" class="block px-3 py-2 text-sm font-medium text-ink bg-surface rounded-md border border-hairline">Study Planner</a>
                <a href="/space-shuter/library" class="block px-3 py-2 text-sm text-steel hover:text-ink hover:bg-surface/50 rounded-md transition-colors">My Library</a>
                <a href="/space-shuter/saved" class="block px-3 py-2 text-sm text-steel hover:text-ink hover:bg-surface/50 rounded-md transition-colors">Saved Bookmarks</a>
                <a href="/space-shuter/subscription" class="block px-3 py-2 text-sm text-steel hover:text-ink hover:bg-surface/50 rounded-md transition-colors">My Subscription</a>
            </div>
        </aside>
        
        <div class="col-span-1 md:col-span-3">
            <h1 class="text-3xl font-semibold text-ink tracking-tight mb-4">Study Planner</h1>
            <p class="text-slate text-sm mb-8">Organize your aerospace learning journey. Set goals, track progress, and conquer the cosmos.</p>
            
            <div class="bg-canvas border border-hairline rounded-xl p-8 mb-8 text-center">
                <svg class="w-12 h-12 text-brand-green mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                <h3 class="text-xl font-medium text-ink mb-2">Your Personal Syllabus</h3>
                <p class="text-steel text-sm max-w-md mx-auto mb-6">Create custom study modules based on our article library and track your reading hours automatically.</p>
                
                <button class="bg-brand-green text-primary font-medium text-sm px-6 py-2.5 rounded-lg hover:bg-brand-green-deep transition-colors inline-block">
                    Create New Plan
                </button>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Example Active Plan -->
                <div class="bg-surface border border-hairline rounded-xl p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h4 class="font-medium text-ink">Introduction to Astrophysics</h4>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-brand-green bg-brand-green/10 px-2 py-1 rounded">Active</span>
                    </div>
                    <div class="w-full bg-hairline rounded-full h-1.5 mb-2">
                        <div class="bg-brand-green h-1.5 rounded-full" style="width: 45%"></div>
                    </div>
                    <div class="flex justify-between text-xs text-steel mb-6">
                        <span>Progress: 45%</span>
                        <span>4 of 9 Modules</span>
                    </div>
                    <a href="#" class="text-sm text-ink font-medium hover:underline">Continue Learning &rarr;</a>
                </div>
                
                <!-- Example Completed Plan -->
                <div class="bg-surface border border-hairline rounded-xl p-6 opacity-70">
                    <div class="flex justify-between items-start mb-4">
                        <h4 class="font-medium text-ink">Mars Rover Telemetry</h4>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate bg-hairline px-2 py-1 rounded">Completed</span>
                    </div>
                    <div class="w-full bg-hairline rounded-full h-1.5 mb-2">
                        <div class="bg-slate h-1.5 rounded-full" style="width: 100%"></div>
                    </div>
                    <div class="flex justify-between text-xs text-steel mb-6">
                        <span>Progress: 100%</span>
                        <span>Earned Certificate</span>
                    </div>
                    <a href="#" class="text-sm text-ink font-medium hover:underline">Review Material &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
