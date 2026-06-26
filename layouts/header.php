<?php
// layouts/header.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title><?= isset($page_title) ? htmlspecialchars($page_title) : 'Space Shutter | Beyond Earth, Into Infinity' ?></title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Add Cinzel for headings, Inter for body -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#05050a", // Deep space black
                        "on-primary": "#ffffff",
                        "brand-purple": "#7e22ce", // Deep purple
                        "brand-purple-deep": "#581c87",
                        "brand-gold": "#fbbf24", // Gold for accents
                        canvas: "#000000",
                        "canvas-dark": "#05050a",
                        surface: "#111116",
                        "surface-soft": "#1a1a24",
                        hairline: "#27272a",
                        ink: "#ffffff", // Main text is white
                        slate: "#a1a1aa", // Muted text
                        steel: "#71717a",
                        "brand-error": "#ef4444"
                    },
                    fontFamily: {
                        sans: ["Inter", "sans-serif"],
                        serif: ["Cinzel", "serif"],
                    },
                    backgroundImage: {
                        'space-texture': 'radial-gradient(ellipse at center, #111116 0%, #000000 100%)',
                    }
                }
            }
        }
    </script>
    <style>
        body { 
            background-color: transparent; 
            color: #ffffff; 
            font-family: 'Inter', sans-serif; 
            min-height: 100vh;
        }
        h1, h2, h3, h4, .font-serif {
            font-family: 'Cinzel', serif;
            letter-spacing: 0.05em;
        }
        /* Custom Hover Effect Class */
        .hover-glow { transition: all 0.3s ease; }
        .hover-glow:hover { text-shadow: 0 0 10px rgba(126,34,206,0.8); transform: translateY(-1px); }
        .hover-glow-card { transition: all 0.3s ease; }
        .hover-glow-card:hover { box-shadow: 0 0 25px rgba(126,34,206,0.4); transform: translateY(-3px) scale(1.01); border-color: rgba(126,34,206,0.5); }
    </style>
    <!-- Favicon -->
    <link rel="icon" href="/space-shuter/favicon.png" type="image/png">
</head>
<body class="antialiased selection:bg-brand-purple selection:text-white">

    <!-- Background Layer -->
    <div class="fixed inset-0 z-[-2]" style="background-color: #000000; background-image: url('https://www.transparenttextures.com/patterns/stardust.png'), radial-gradient(ellipse at top, #150a21 0%, #000000 100%);"></div>
    <!-- Interactive Canvas Starfield -->
    <canvas id="living-background" class="fixed inset-0 pointer-events-none z-[-1]"></canvas>

    <!-- Top Navigation -->
    <nav class="fixed top-0 w-full bg-black/60 backdrop-blur-md border-b border-white/10 z-50 h-[80px] flex items-center px-10 justify-between transition-all">
        <!-- Logo (Left) -->
        <div class="flex-1">
            <a href="/space-shuter/" class="font-serif font-bold tracking-widest text-xl text-white uppercase flex items-center gap-2 hover-glow">
                Space <span class="text-white font-light opacity-70">Shutter</span>
            </a>
        </div>
        
        <!-- Desktop Menu (Center) -->
        <div class="hidden md:flex items-center justify-center gap-8 text-sm font-medium text-gray-300 bg-white/5 border border-white/10 rounded-full px-8 py-2.5 backdrop-blur-lg shadow-[0_0_20px_rgba(255,255,255,0.05)] absolute left-1/2 -translate-x-1/2">
            <a href="/space-shuter/planet" class="hover:text-white hover-glow transition-colors">Destinations</a>
            <a href="/space-shuter/discover" class="hover:text-white hover-glow transition-colors">Discover</a>
            <a href="/space-shuter/library" class="hover:text-white hover-glow transition-colors">Archive</a>
            <a href="/space-shuter/books" class="hover:text-white hover-glow transition-colors">Books</a>
            <a href="/space-shuter/study-planner" class="hover:text-white hover-glow transition-colors">Study Planner</a>
        </div>
        
        <!-- Profile / Login (Right) -->
        <div class="flex-1 flex justify-end items-center gap-6">
            <?php if(isset($_SESSION['user_id'])): ?>
                <?php $displayName = !empty($_SESSION['username']) ? $_SESSION['username'] : (isset($_SESSION['email']) ? explode('@', $_SESSION['email'])[0] : 'User'); ?>
                <!-- Profile Dropdown -->
                <div class="relative group">
                    <button class="flex items-center gap-3 hover:bg-white/5 px-4 py-2 rounded-full transition-colors border border-transparent hover:border-white/10 focus:outline-none">
                        <img src="https://api.dicebear.com/7.x/bottts/svg?seed=<?= urlencode($displayName) ?>" alt="Avatar" class="w-8 h-8 rounded-full bg-white/5 p-1 shadow-[0_0_15px_rgba(126,34,206,0.5)]">
                        <span class="text-sm font-medium text-white"><?= htmlspecialchars($displayName) ?></span>
                        <svg class="w-4 h-4 text-gray-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    
                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 mt-2 w-56 bg-[#111116] border border-white/10 rounded-lg shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                        <div class="p-4 border-b border-white/10">
                            <p class="text-sm font-bold text-white"><?= htmlspecialchars($displayName) ?></p>
                            <p class="text-xs text-gray-500 truncate"><?= htmlspecialchars($_SESSION['email'] ?? '') ?></p>
                        </div>
                        <div class="py-2">
                            <a href="/space-shuter/profile" class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-white/5 hover-glow transition-colors">My Profile</a>
                            <a href="/space-shuter/library" class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-white/5 hover-glow transition-colors">My Library</a>
                            <a href="/space-shuter/study-planner" class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-white/5 hover-glow transition-colors flex justify-between">Study Hours <span class="text-brand-purple text-xs">View</span></a>
                            <a href="/space-shuter/subscription" class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-white/5 hover-glow transition-colors">Payments & Billing</a>
                        </div>
                        <div class="py-2 border-t border-white/10">
                            <a href="/space-shuter/logout" class="block px-4 py-2 text-sm text-brand-error hover:bg-brand-error/10 transition-colors">Logout</a>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <a href="/space-shuter/login" class="bg-brand-purple text-white px-8 py-2 rounded-full text-sm font-semibold tracking-wider hover:bg-brand-purple-deep transition-all shadow-[0_0_20px_rgba(126,34,206,0.4)] hover:shadow-[0_0_30px_rgba(126,34,206,0.6)] uppercase hover-glow-card">Login</a>
            <?php endif; ?>
        </div>
    </nav>

    <script>
        // Interactive Living Background Script
        const canvas = document.getElementById('living-background');
        const ctx = canvas.getContext('2d');
        let width, height;
        let particles = [];
        let mouse = { x: null, y: null };

        function resize() {
            width = canvas.width = window.innerWidth;
            height = canvas.height = window.innerHeight;
        }

        window.addEventListener('resize', resize);
        window.addEventListener('mousemove', (e) => {
            mouse.x = e.x;
            mouse.y = e.y;
        });

        class Particle {
            constructor() {
                this.x = Math.random() * width;
                this.y = Math.random() * height;
                this.size = Math.random() * 1.5 + 0.5;
                this.speedX = Math.random() * 0.5 - 0.25;
                this.speedY = Math.random() * 0.5 - 0.25;
                this.baseAlpha = Math.random() * 0.5 + 0.2;
            }
            update() {
                this.x += this.speedX;
                this.y += this.speedY;

                // Interactive parallax movement towards cursor
                if (mouse.x && mouse.y) {
                    let dx = mouse.x - this.x;
                    let dy = mouse.y - this.y;
                    let distance = Math.sqrt(dx * dx + dy * dy);
                    if (distance < 200) {
                        this.x += dx * 0.005;
                        this.y += dy * 0.005;
                    }
                }

                if (this.x > width) this.x = 0;
                if (this.x < 0) this.x = width;
                if (this.y > height) this.y = 0;
                if (this.y < 0) this.y = height;
            }
            draw() {
                ctx.fillStyle = `rgba(255, 255, 255, ${this.baseAlpha})`;
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
            }
        }

        function initStars() {
            resize();
            particles = [];
            let numStars = window.innerWidth < 768 ? 75 : 150;
            for (let i = 0; i < numStars; i++) {
                particles.push(new Particle());
            }
            animateStars();
        }

        function animateStars() {
            ctx.clearRect(0, 0, width, height);
            for (let i = 0; i < particles.length; i++) {
                particles[i].update();
                particles[i].draw();
            }
            requestAnimationFrame(animateStars);
        }

        initStars();
    </script>
