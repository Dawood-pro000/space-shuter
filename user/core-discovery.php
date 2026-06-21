<?php
require_once __DIR__ . '/../api/api.php';
$articles = fetchSupabase('articles', 'select=id,title,slug,image_url,raw_abstract,created_at&order=created_at.desc&limit=10') ?? [];
$heroArticle = !empty($articles) ? $articles[0] : null;
$otherArticles = array_slice($articles, 1);
?>

<?php include __DIR__ . '/../templates/header.php'; ?>
<?php include __DIR__ . '/../templates/sidebar.php'; ?>

<!-- Main Content Canvas (converted to PHP template) -->
<main class="ml-64 pt-24 px-gutter pb-24 min-h-screen">
    <div class="max-w-[1400px] mx-auto grid grid-cols-12 gap-gutter">
        <!-- Header Section -->
        <div class="col-span-12 mb-8 flex justify-between items-end">
            <div>
                <p class="font-code-data text-primary-fixed mb-2 tracking-tighter opacity-70">SYSTEM_AUTH: VALIDATED // LEVEL_04_ACCESS</p>
                <h2 class="font-headline-lg text-headline-lg uppercase text-on-surface">Discovery Feed</h2>
            </div>
            <div class="text-right hidden lg:block">
                <p class="font-label-caps text-outline mb-1 uppercase">Stellar Timecode</p>
                <p class="font-code-data text-headline-md text-secondary-fixed tracking-widest" id="clock">00:00:00:00</p>
            </div>
        </div>

        <!-- Dashboard Feed (Bento Grid) -->
        <div class="col-span-12 lg:col-span-9 space-y-gutter">
            <!-- Hero Highlight Discovery -->
            <section class="glass-panel group overflow-hidden h-[400px] flex">
                <div class="scanline"></div>
                <div class="w-2/3 relative">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="Hero image" src="<?= htmlspecialchars($heroArticle ? $heroArticle['image_url'] : 'https://lh3.googleusercontent.com/aida-public/AB6AXuAElQPbY6q1SCRjCWAgBApxbSU-aNpQE3aEFVywzIx09BCmihH0Jzbkhg6FEyHAlBJzjcqavqgIM4VIgefoXO9XZd93AiwsA_Ag7xx4DgsAeGm-yLU-n_b9xo40RhjIssuH4-DGc5oZB1gHbbWh8y-406A7RKraeFGDD4vD3D5kquDTqDLFd-FbmJaJ15WvThFl65VcsWHWqhPnIorS1RDCt_paYp5sCJEVlknAbas2JnWUl6YFdtfrRy700cFbrPFYtKh8j0j231E'); ?>" />
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-transparent to-surface-container-lowest/80"></div>
                    <div class="absolute top-4 left-4 p-2 bg-surface-container-lowest/80 border border-primary-fixed/30 text-primary-fixed font-code-data text-[10px]">
                        COORDS: 17h 59m 24s | +44° 24′ 45″
                    </div>
                </div>
                <div class="w-1/3 p-8 flex flex-col justify-center bg-surface-container-lowest/40 backdrop-blur-md border-l border-outline-variant/30">
                    <span class="text-primary-fixed font-code-data text-[12px] mb-2">TARGET_ID: KEPLER-186F</span>
                    <h3 class="font-headline-md text-headline-md mb-4 uppercase"><?= $heroArticle ? htmlspecialchars($heroArticle['title']) : 'Bio-Luminous Exoplanet'; ?></h3>
                    <p class="text-on-surface-variant font-body-md text-body-md mb-8 leading-relaxed"><?= $heroArticle ? htmlspecialchars($heroArticle['raw_abstract']) : 'Atmospheric parsing indicates significant bio-signatures.'; ?></p>
                    <?php if ($heroArticle): ?>
                    <a href="article-view.php?slug=<?= htmlspecialchars($heroArticle['slug']) ?>" class="border border-primary-fixed text-primary-fixed px-6 py-3 font-label-caps text-label-caps hover:bg-primary-fixed hover:text-on-primary-fixed transition-all flex items-center gap-2 group/btn self-start">VIEW DATA <span class="material-symbols-outlined text-[18px] group-hover/btn:translate-x-1 transition-transform">arrow_forward</span></a>
                    <?php endif; ?>
                </div>
            </section>

            <!-- Grid of Discoveries -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter mt-6">
                <?php foreach ($otherArticles as $article): ?>
                <div class="glass-panel group p-6 hover:border-primary-fixed/60 transition-colors">
                    <div class="relative h-48 mb-6 overflow-hidden border border-outline-variant/30">
                        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="Article image" src="<?= htmlspecialchars($article['image_url']) ?>" />
                        <div class="absolute top-2 right-2 text-[10px] font-code-data text-on-surface/50">#<?= htmlspecialchars($article['id']) ?></div>
                    </div>
                    <h4 class="font-headline-md text-[20px] mb-2 uppercase text-on-surface"><?= htmlspecialchars($article['title']) ?></h4>
                    <p class="text-on-surface-variant font-body-md text-body-md mb-6 line-clamp-2"><?= htmlspecialchars($article['raw_abstract']) ?></p>
                    <div class="flex justify-between items-center">
                        <span class="font-code-data text-secondary-fixed text-[12px]">STATUS: NOMINAL</span>
                        <a href="article-view.php?slug=<?= htmlspecialchars($article['slug']) ?>" class="text-primary-fixed font-label-caps text-label-caps hover:underline">READ</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Sidebar Telemetry (keep as static panel) -->
        <aside class="col-span-12 lg:col-span-3 space-y-gutter">
            <div class="glass-panel p-6">
                <h5 class="font-label-caps text-label-caps text-primary-fixed mb-6 border-b border-primary-fixed/20 pb-2 flex justify-between items-center">
                    LIVE TELEMETRY
                    <span class="w-2 h-2 bg-primary-fixed animate-pulse"></span>
                </h5>
                <div class="space-y-6">
                    <div>
                        <div class="flex justify-between text-[11px] font-code-data text-outline mb-2">
                            <span>CURRENT VELOCITY</span>
                            <span class="text-primary-fixed">0.12c</span>
                        </div>
                        <div class="h-1 bg-surface-variant w-full overflow-hidden">
                            <div class="h-full bg-primary-fixed w-[65%]" style="box-shadow: 0 0 8px #62f9ee"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between text-[11px] font-code-data text-outline mb-2">
                            <span>OXYGEN LEVELS</span>
                            <span class="text-primary-fixed">98.4%</span>
                        </div>
                        <div class="h-1 bg-surface-variant w-full overflow-hidden">
                            <div class="h-full bg-primary-fixed w-[98%]" style="box-shadow: 0 0 8px #62f9ee"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between text-[11px] font-code-data text-outline mb-2">
                            <span>SHIELD INTEGRITY</span>
                            <span class="text-primary-fixed">82%</span>
                        </div>
                        <div class="h-1 bg-surface-variant w-full overflow-hidden">
                            <div class="h-full bg-primary-fixed w-[82%]" style="box-shadow: 0 0 8px #62f9ee"></div>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-outline-variant/30">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-[11px] font-code-data text-outline uppercase">Gemini Parsing</span>
                            <span class="px-2 py-0.5 bg-secondary-container/30 text-secondary-fixed text-[9px] font-code-data border border-secondary-fixed/30">ACTIVE</span>
                        </div>
                        <p class="text-[12px] text-on-surface-variant italic font-body-md">"Identifying potential tectonic activity on Target Kepler-186f..."</p>
                    </div>
                </div>
            </div>

            <div class="glass-panel p-6 h-64 relative overflow-hidden flex items-center justify-center">
                <div class="scanline"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-48 h-48 rounded-full border border-primary-fixed/20 relative flex items-center justify-center">
                        <div class="w-32 h-32 rounded-full border border-primary-fixed/20"></div>
                        <div class="w-16 h-16 rounded-full border border-primary-fixed/20"></div>
                        <div class="absolute w-full h-[1px] bg-primary-fixed/20"></div>
                        <div class="absolute h-full w-[1px] bg-primary-fixed/20"></div>
                        <div class="absolute top-1/2 left-1/2 w-1/2 h-[1px] bg-primary-fixed origin-left -rotate-45 animate-[spin_4s_linear_infinite]" style="box-shadow: 0 0 10px #62f9ee"></div>
                    </div>
                </div>
                <div class="absolute bottom-4 left-4 font-code-data text-[10px] text-outline">SCAN_SWEEP_ACTIVE</div>
            </div>

            <div class="space-y-2">
                <button class="w-full text-left p-4 border border-outline-variant/30 hover:bg-surface-variant/20 transition-all group flex items-center justify-between">
                    <span class="font-label-caps text-label-caps">ORBITAL VIEW</span>
                    <span class="material-symbols-outlined text-outline group-hover:text-primary-fixed text-[18px]">travel_explore</span>
                </button>
                <button class="w-full text-left p-4 border border-outline-variant/30 hover:bg-surface-variant/20 transition-all group flex items-center justify-between">
                    <span class="font-label-caps text-label-caps">CARGO LOGS</span>
                    <span class="material-symbols-outlined text-outline group-hover:text-primary-fixed text-[18px]">inventory_2</span>
                </button>
            </div>
        </aside>
    </div>
</main>

<?php include __DIR__ . '/../templates/footer.php'; ?>