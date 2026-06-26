<?php
$page_title = 'AI Control Center | Space Shutter';
require_once __DIR__ . '/../../layouts/header.php';

// Add category column if it doesn't exist to be safe
try {
    require_once __DIR__ . '/../../services/DatabaseService.php';
    $db = DatabaseService::getConnection();
    $db->exec("ALTER TABLE posts ADD COLUMN IF NOT EXISTS category VARCHAR(50) DEFAULT 'General'");
} catch (Exception $e) {
    // Ignore if fails
}

?>

<main class="pt-32 pb-24 px-8 min-h-[80vh] max-w-7xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Admin Sidebar -->
        <?php require_once __DIR__ . '/../../admin/layouts/sidebar.php'; ?>
        <div class="col-span-3">
            <h1 class="text-3xl font-semibold text-white tracking-tight mb-4">Fetch & Publish Content</h1>
            <div class="bg-surface rounded-lg border border-white/5 p-8 shadow-xl">
                
                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['publish_selected'])): ?>
                    <?php
                    $count = 0;
                    try {
                        if (!empty($_POST['selected_posts'])) {
                            foreach ($_POST['selected_posts'] as $index) {
                                $title = $_POST['titles'][$index];
                                $slug = $_POST['slugs'][$index];
                                $abstract = $_POST['abstracts'][$index];
                                $content = $_POST['contents'][$index];
                                $image_url = $_POST['image_urls'][$index];
                                $category = $_POST['categories'][$index];
                                
                                $stmt = $db->prepare("INSERT INTO posts (title, slug, abstract, content, image_url, category, status, publish_date) VALUES (?, ?, ?, ?, ?, ?, 'published', NOW()) ON CONFLICT (slug) DO NOTHING");
                                if ($stmt->execute([$title, $slug, $abstract, $content, $image_url, $category])) {
                                    $count++;
                                }
                            }
                        }
                        echo "<div class='mb-6 p-4 bg-green-500/10 border border-green-500/30 text-green-400 rounded-lg'>Successfully published $count selected posts.</div>";
                    } catch (Exception $e) {
                        echo "<div class='mb-6 p-4 bg-red-500/10 border border-red-500/30 text-red-400 rounded-lg'>Error publishing posts: " . $e->getMessage() . "</div>";
                    }
                    ?>
                <?php endif; ?>

                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fetch_posts'])): ?>
                    <p class="text-gray-400 text-sm mb-6 border-b border-white/10 pb-4">Review the fetched posts below. Select the category for each and check the box to publish them.</p>
                    <form method="POST" action="/space-shuter/admin/ai" class="space-y-6">
                        
                        <?php
                        $titles = [
                            "The Mysteries of the Andromeda Galaxy", "JWST Discovers New Exoplanet", "Mars Rover Finds Ancient Riverbed",
                            "The Event Horizon Telescope's Latest Black Hole", "Understanding Dark Matter", "The Artemis Mission: Back to the Moon",
                            "Venus's Atmospheric Anomalies", "Saturn's Rings are Disappearing", "The Voyager Probes' Journey into Interstellar Space",
                            "SpaceX's Starship Development"
                        ];
                        
                        $categories = ['Astrophysics', 'Space Exploration', 'Planetary Science', 'Technology', 'General'];
                        
                        foreach ($titles as $index => $title) {
                            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title), '-')) . '-' . time();
                            $abstract = "This article dives deep into recent discoveries. Utilizing data from multiple space agencies.";
                            $content = "<p>Here is the detailed content for this aerospace topic. Further research and observation are required.</p>";
                            $image_url = "https://images.unsplash.com/photo-[RAND]?q=80&w=1000&auto=format&fit=crop"; // Using unsplash
                            $image_url = str_replace('[RAND]', ['1614728894747-a83421e2b9c9', '1614730321146-b6fa6a46bcb4', '1614732414444-096e5f1122d5'][array_rand([0,1,2])], $image_url);
                        ?>
                        <div class="bg-black/30 border border-white/5 rounded-lg p-5 flex flex-col md:flex-row gap-6 items-start">
                            <div class="flex-shrink-0 pt-1">
                                <input type="checkbox" name="selected_posts[]" value="<?= $index ?>" class="w-5 h-5 text-brand-purple bg-black border-white/20 rounded focus:ring-brand-purple" checked>
                            </div>
                            <div class="flex-grow space-y-4 w-full">
                                <div>
                                    <h3 class="text-lg font-bold text-white"><?= htmlspecialchars($title) ?></h3>
                                    <p class="text-xs text-gray-400 mt-1"><?= htmlspecialchars($abstract) ?></p>
                                </div>
                                <div class="flex items-center gap-4">
                                    <label class="text-xs text-gray-500 uppercase tracking-widest font-semibold">Category</label>
                                    <select name="categories[<?= $index ?>]" class="bg-black border border-white/10 text-white text-sm rounded focus:ring-brand-purple focus:border-brand-purple block p-2 w-full md:w-64">
                                        <?php foreach ($categories as $cat): ?>
                                            <option value="<?= htmlspecialchars($cat) ?>"><?= htmlspecialchars($cat) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!-- Hidden Fields -->
                                <input type="hidden" name="titles[<?= $index ?>]" value="<?= htmlspecialchars($title) ?>">
                                <input type="hidden" name="slugs[<?= $index ?>]" value="<?= htmlspecialchars($slug) ?>">
                                <input type="hidden" name="abstracts[<?= $index ?>]" value="<?= htmlspecialchars($abstract) ?>">
                                <input type="hidden" name="contents[<?= $index ?>]" value="<?= htmlspecialchars($content) ?>">
                                <input type="hidden" name="image_urls[<?= $index ?>]" value="<?= htmlspecialchars($image_url) ?>">
                            </div>
                        </div>
                        <?php } ?>
                        
                        <div class="flex justify-end pt-4 border-t border-white/10">
                            <a href="/space-shuter/admin/ai" class="px-6 py-2.5 rounded-lg text-gray-400 hover:text-white transition-colors mr-4">Cancel</a>
                            <button type="submit" name="publish_selected" class="bg-brand-purple text-white px-8 py-2.5 rounded-lg font-semibold hover:bg-brand-purple-deep transition-colors shadow-[0_0_15px_rgba(126,34,206,0.3)]">
                                Publish Selected Posts
                            </button>
                        </div>
                    </form>
                <?php else: ?>
                    <p class="text-gray-400 text-sm mb-6">Click the button below to fetch new space-related posts from the AI pipeline. You will be able to review and categorize them before publishing.</p>
                    <form method="POST" action="/space-shuter/admin/ai">
                        <button type="submit" name="fetch_posts" class="bg-brand-purple text-white px-6 py-3 rounded-lg font-semibold hover:bg-brand-purple-deep transition-colors shadow-[0_0_15px_rgba(126,34,206,0.3)]">
                            Fetch New AI Posts
                        </button>
                    </form>
                <?php endif; ?>
                
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
