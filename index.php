<?php
require_once __DIR__ . '/api/api.php';

// Fetch top 3 recent automated articles from Supabase to show live data
$featured_articles = fetchSupabase('articles', 'select=*&order=created_at.desc&limit=3') ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Mintlify | The Intelligent Knowledge Platform</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#0a0a0a",
                        "on-primary": "#ffffff",
                        "brand-green": "#00d4a4",
                        "brand-green-deep": "#00b48a",
                        canvas: "#ffffff",
                        "canvas-dark": "#0a0a0a",
                        surface: "#f7f7f7",
                        "surface-soft": "#fafafa",
                        hairline: "#e5e5e5",
                        ink: "#0a0a0a",
                        charcoal: "#1c1c1e",
                        slate: "#3a3a3c",
                        steel: "#5a5a5c",
                        "hero-sky-from": "#87a8c8",
                        "hero-sky-to": "#f5e9d8",
                        "on-dark": "#ffffff",
                        "on-dark-muted": "#b3b3b3",
                    },
                    fontFamily: {
                        sans: ["Inter", "sans-serif"],
                    },
                    borderRadius: {
                        md: "8px",
                        lg: "12px",
                        xl: "16px",
                        full: "9999px"
                    }
                }
            }
        }
    </script>
    <style>
        body { background-color: #ffffff; color: #0a0a0a; font-family: 'Inter', sans-serif; }
        .hero-gradient {
            background: linear-gradient(180deg, #87a8c8 0%, #f5e9d8 100%);
        }
        .hero-mockup-shadow {
            box-shadow: rgba(0, 0, 0, 0.12) 0px 24px 48px -8px;
        }
    </style>
</head>
<body class="antialiased selection:bg-brand-green selection:text-primary">

    <!-- Top Navigation -->
    <nav class="fixed top-0 w-full bg-canvas/80 backdrop-blur-md border-b border-hairline z-50 h-[64px] flex items-center px-8 justify-between">
        <div class="flex items-center gap-8">
            <a href="index.php" class="font-semibold tracking-tight text-xl text-ink">Project Vision</a>
            <div class="hidden md:flex items-center gap-6 text-sm font-medium text-steel">
                <a href="#" class="hover:text-ink transition-colors">Solutions</a>
                <a href="#" class="hover:text-ink transition-colors">Pricing</a>
                <a href="user/core-discovery.php" class="hover:text-ink transition-colors">Documentation</a>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <a href="auth/login.php" class="text-sm font-medium text-ink hover:text-slate transition-colors">Sign in</a>
            <a href="auth/login.php" class="bg-primary text-on-primary px-5 py-2.5 rounded-full text-sm font-medium hover:bg-charcoal transition-colors">Get Started</a>
        </div>
    </nav>

    <!-- Atmospheric Hero Section -->
    <section class="hero-gradient pt-32 pb-24 px-8 min-h-[80vh] flex flex-col items-center justify-center text-center overflow-hidden relative">
        <div class="max-w-4xl relative z-10 space-y-8 mt-12">
            <h1 class="text-[72px] leading-[1.05] tracking-[-2px] font-semibold text-primary">
                The intelligent<br/>Knowledge Platform
            </h1>
            <p class="text-lg text-slate max-w-2xl mx-auto font-normal">
                Mintlify presents documentation infrastructure with a dual-mode aesthetic. We deliver atmospheric marketing presentation paired with dense developer-grade documentation surfaces.
            </p>
            <div class="flex items-center justify-center gap-4 pt-4">
                <a href="user/core-discovery.php" class="bg-brand-green text-primary px-6 py-3 rounded-full text-sm font-medium hover:bg-brand-green-deep transition-colors shadow-sm">
                    Start exploring
                </a>
                <a href="auth/login.php" class="bg-transparent border border-primary text-primary px-6 py-3 rounded-full text-sm font-medium hover:bg-primary/5 transition-colors">
                    Talk to sales
                </a>
            </div>
        </div>
        
        <!-- Hero Product Mockup -->
        <div class="mt-20 w-full max-w-5xl bg-canvas rounded-lg border border-hairline hero-mockup-shadow overflow-hidden relative z-10 flex text-left h-[500px]">
            <div class="w-64 bg-surface border-r border-hairline p-4 hidden md:block">
                <div class="text-[11px] font-semibold uppercase tracking-[0.5px] text-steel mb-4 mt-2 px-2">Components</div>
                <div class="space-y-1">
                    <div class="px-2 py-1.5 text-sm font-medium text-ink bg-canvas rounded-md shadow-sm border border-hairline">Overview</div>
                    <div class="px-2 py-1.5 text-sm text-steel hover:text-ink cursor-pointer">Quickstart</div>
                    <div class="px-2 py-1.5 text-sm text-steel hover:text-ink cursor-pointer">API Reference</div>
                </div>
            </div>
            <div class="flex-1 p-10 overflow-hidden">
                <h2 class="text-3xl font-semibold text-ink tracking-tight mb-4">Latest Documentation</h2>
                <p class="text-slate text-base mb-8">Access the newest telemetry and aerospace articles directly from the Supabase registry.</p>
                
                <div class="space-y-4">
                    <?php if (empty($featured_articles)): ?>
                        <div class="p-4 border border-hairline rounded-md text-sm text-steel">No new documentation available.</div>
                    <?php else: ?>
                        <?php foreach ($featured_articles as $article): ?>
                        <div class="p-5 border border-hairline rounded-lg hover:shadow-sm transition-shadow flex items-start justify-between group cursor-pointer bg-canvas" onclick="window.location.href='user/article-view.php?slug=<?= htmlspecialchars($article['slug']) ?>'">
                            <div>
                                <h3 class="text-base font-semibold text-ink mb-1 group-hover:text-brand-green transition-colors"><?= htmlspecialchars($article['title']) ?></h3>
                                <p class="text-sm text-slate line-clamp-1"><?= htmlspecialchars($article['raw_abstract']) ?></p>
                            </div>
                            <span class="text-xs font-medium text-steel bg-surface px-2 py-1 rounded-sm border border-hairline whitespace-nowrap">API Ref</span>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-canvas border-t border-hairline py-16 px-8">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row justify-between gap-12">
            <div class="space-y-4">
                <div class="font-semibold tracking-tight text-xl text-ink">Project Vision</div>
                <p class="text-sm text-steel">© 2026 Space Shutter Systems. All rights reserved.</p>
            </div>
            <div class="flex gap-16">
                <div class="space-y-4">
                    <h4 class="text-sm font-medium text-ink">Product</h4>
                    <div class="flex flex-col gap-2 text-sm text-steel">
                        <a href="#" class="hover:text-ink transition-colors">Features</a>
                        <a href="#" class="hover:text-ink transition-colors">Integrations</a>
                        <a href="#" class="hover:text-ink transition-colors">Pricing</a>
                    </div>
                </div>
                <div class="space-y-4">
                    <h4 class="text-sm font-medium text-ink">Resources</h4>
                    <div class="flex flex-col gap-2 text-sm text-steel">
                        <a href="#" class="hover:text-ink transition-colors">Documentation</a>
                        <a href="#" class="hover:text-ink transition-colors">API Reference</a>
                        <a href="#" class="hover:text-ink transition-colors">Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
