<?php
// layouts/header.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title><?= isset($page_title) ? htmlspecialchars($page_title) : 'Space Shutter | The Intelligent Knowledge Platform' ?></title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Geist+Mono:wght@400;500&display=swap" rel="stylesheet"/>
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
                        "brand-error": "#d45656"
                    },
                    fontFamily: {
                        sans: ["Inter", "sans-serif"],
                        mono: ["Geist Mono", "monospace"],
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
        .hero-gradient { background: linear-gradient(180deg, #87a8c8 0%, #f5e9d8 100%); }
    </style>
</head>
<body class="antialiased selection:bg-brand-green selection:text-primary">

    <!-- Top Navigation -->
    <nav class="fixed top-0 w-full bg-canvas/80 backdrop-blur-md border-b border-hairline z-50 h-[64px] flex items-center px-8 justify-between">
        <div class="flex items-center gap-8">
            <a href="/space-shuter/" class="font-semibold tracking-tight text-xl text-ink">Space Shutter</a>
            <div class="hidden md:flex items-center gap-6 text-sm font-medium text-steel">
                <a href="/space-shuter/discover" class="hover:text-ink transition-colors">Discover</a>
                <a href="/space-shuter/study-planner" class="hover:text-ink transition-colors">Study Plan</a>
                <a href="/space-shuter/library" class="hover:text-ink transition-colors">Library</a>
                <a href="/space-shuter/about" class="hover:text-ink transition-colors">About</a>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <?php if(isset($_SESSION['user_id'])): ?>
                <span class="text-sm font-medium text-brand-green mr-2">Hello, <?= htmlspecialchars($_SESSION['username'] ?? 'User') ?></span>
                <a href="/space-shuter/feed" class="text-sm font-medium text-ink hover:text-slate transition-colors">Dashboard</a>
                <a href="/space-shuter/logout" class="bg-surface text-ink border border-hairline px-4 py-2 rounded-full text-sm font-medium hover:bg-hairline transition-colors">Logout</a>
            <?php else: ?>
                <a href="/space-shuter/login" class="text-sm font-medium text-ink hover:text-slate transition-colors">Sign in</a>
                <a href="/space-shuter/register" class="bg-primary text-on-primary px-5 py-2.5 rounded-full text-sm font-medium hover:bg-charcoal transition-colors">Get Started</a>
            <?php endif; ?>
        </div>
    </nav>
