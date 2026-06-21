<?php
require_once __DIR__ . '/config/api.php';

// In a real app, user auth would happen here.
$user_id = 'user_001'; // Simulated user ID

$plan = null;
$loading = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic'])) {
    $topic = htmlspecialchars($_POST['topic']);
    $loading = true;
    
    // Here we would call Gemini API to generate the plan.
    // For now, we simulate the output. In a full implementation, you'd use a dedicated Gemini helper here.
    
    // Simulate generation delay and result
    $plan = [
        'title' => 'Mastering ' . strtoupper($topic),
        'modules' => [
            ['title' => 'Phase 1: Foundational Theories', 'desc' => 'Understand the core physical properties and historical discovery.'],
            ['title' => 'Phase 2: Orbital Mechanics', 'desc' => 'Mathematical models for trajectories and gravity wells.'],
            ['title' => 'Phase 3: Deep Space Observation', 'desc' => 'Analyzing thermal signatures and radio telemetry.']
        ]
    ];
    
    // In a real app, insert into Supabase 'learning_tracks'
}
?>
<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>AI Study Planner | Project Vision</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;800&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary-fixed": "#62f9ee",
                        "secondary-fixed": "#98f2ed",
                        "outline": "#859491",
                        "outline-variant": "#3c4948",
                        "error": "#ffb4ab",
                        "surface-container-lowest": "#0c0f0f",
                        "surface-container-low": "#1a1c1d",
                        "surface-variant": "#333536",
                        "on-surface-variant": "#bacac7"
                    },
                    fontFamily: {
                        "body-md": ["Space Grotesk"],
                        "headline-lg": ["Orbitron"],
                        "code-data": ["Space Grotesk"],
                        "label-caps": ["Space Grotesk"],
                        "headline-md": ["Orbitron"]
                    }
                }
            }
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            line-height: 1;
        }
        .glass-panel {
            background: rgba(31, 40, 51, 0.4);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(60, 73, 72, 0.3);
        }
        .laser-glow {
            box-shadow: 0 0 15px rgba(102, 252, 241, 0.2);
            transition: all 0.3s ease;
        }
        .laser-glow:hover {
            box-shadow: 0 0 25px rgba(102, 252, 241, 0.6);
        }
        body {
            background-color: #0b0c10;
            color: #e2e2e3;
        }
        .scanline {
            width: 100%;
            height: 1px;
            background: rgba(102, 252, 241, 0.3);
            position: absolute;
            top: 0;
            left: 0;
            animation: scan 4s linear infinite;
        }
        @keyframes scan {
            from { top: 0; }
            to { top: 100%; }
        }
    </style>
</head>
<body class="antialiased font-body-md text-base overflow-x-hidden">
    <div class="fixed inset-0 pointer-events-none opacity-20 z-0">
        <div class="absolute top-8 left-8 font-code-data text-sm text-secondary-fixed">COORD: 11.42.09 // ACADEMY_CORE</div>
        <div class="w-full h-full border border-outline-variant/10 m-4"></div>
    </div>

    <header class="flex justify-between items-center w-full px-8 h-16 z-50 bg-[#0c0f0f]/80 backdrop-blur-xl border-b border-outline-variant/30 fixed top-0 left-0">
        <a href="/core-discovery.php" class="font-headline-md text-xl text-primary-fixed tracking-widest uppercase hover:text-white transition-colors">Project Vision</a>
        <nav class="hidden md:flex items-center gap-8">
            <a class="text-on-surface-variant hover:text-primary-fixed transition-colors font-body-md" href="/core-discovery.php">Archive</a>
            <a class="text-primary-fixed font-bold border-b-2 border-primary-fixed pb-1 font-body-md" href="#">Neural Planner</a>
        </nav>
        <div class="flex items-center gap-6">
            <span class="material-symbols-outlined text-primary-fixed cursor-pointer">account_circle</span>
        </div>
    </header>

    <main class="pt-24 min-h-screen relative z-10 max-w-5xl mx-auto px-4 sm:px-8 lg:px-12 pb-12">
        <div class="mb-12 text-center">
            <h1 class="font-headline-lg text-4xl text-white uppercase tracking-wider">AI Study Planner</h1>
            <p class="font-code-data text-on-surface-variant mt-3 tracking-widest uppercase">Generate customized learning roadmaps using Gemini</p>
        </div>

        <?php if (!$plan): ?>
        <div class="glass-panel p-8 relative overflow-hidden max-w-2xl mx-auto border-t-4 border-primary-fixed">
            <div class="scanline"></div>
            <div class="flex items-center gap-3 mb-6 justify-center">
                <span class="material-symbols-outlined text-primary-fixed text-4xl">neurology</span>
            </div>
            <h2 class="text-center font-headline-md text-xl text-white uppercase tracking-wider mb-8">What do you want to master?</h2>
            
            <form method="POST" action="" class="space-y-6" id="planner-form">
                <div>
                    <label class="block font-code-data text-xs text-outline uppercase mb-2">Subject / Concept</label>
                    <input type="text" name="topic" required placeholder="e.g., Black Hole Thermodynamics, Exoplanet Atmospheres..." 
                           class="w-full bg-[#0b0c10] border border-outline-variant/50 focus:border-primary-fixed focus:ring-1 focus:ring-primary-fixed text-white font-body-md px-4 py-3 outline-none transition-all">
                </div>
                
                <button type="submit" onclick="showLoading()" class="w-full py-4 bg-primary-fixed/10 text-primary-fixed border border-primary-fixed hover:bg-primary-fixed hover:text-[#0b0c10] font-label-caps font-bold tracking-widest uppercase transition-all flex justify-center items-center gap-2 laser-glow">
                    <span class="material-symbols-outlined text-sm">memory</span>
                    Compile Roadmap
                </button>
            </form>

            <div id="loading-state" class="hidden mt-8 text-center space-y-4">
                <span class="material-symbols-outlined text-primary-fixed text-5xl animate-spin">data_usage</span>
                <p class="font-code-data text-secondary-fixed text-sm uppercase tracking-widest animate-pulse">Gemini is synthesizing your learning vectors...</p>
            </div>
        </div>
        <?php else: ?>
        
        <div class="space-y-8 animate-[fadeIn_0.5s_ease-out]">
            <div class="flex justify-between items-center border-b border-outline-variant/50 pb-6">
                <div>
                    <div class="font-code-data text-xs text-primary-fixed uppercase tracking-widest mb-1">Generated Roadmap</div>
                    <h2 class="font-headline-lg text-3xl text-white uppercase"><?= htmlspecialchars($plan['title']) ?></h2>
                </div>
                <button class="px-6 py-2 border border-outline-variant text-on-surface-variant hover:text-white hover:border-primary-fixed font-code-data text-xs uppercase transition-all">Save to Profile</button>
            </div>

            <div class="space-y-6 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-outline-variant/50 before:to-transparent">
                
                <?php foreach ($plan['modules'] as $index => $module): ?>
                <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                    <div class="flex items-center justify-center w-10 h-10 rounded-full border border-primary-fixed bg-[#0c0f0f] text-primary-fixed font-headline-md shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 shadow-[0_0_10px_rgba(98,249,238,0.2)]">
                        <?= $index + 1 ?>
                    </div>
                    
                    <div class="w-[calc(100%-4rem)] md:w-[calc(50%-3rem)] glass-panel p-6 hover:border-primary-fixed/50 transition-colors cursor-pointer">
                        <h3 class="font-headline-md text-lg text-white uppercase tracking-wider mb-2"><?= htmlspecialchars($module['title']) ?></h3>
                        <p class="font-body-md text-on-surface-variant text-sm"><?= htmlspecialchars($module['desc']) ?></p>
                        
                        <div class="mt-4 pt-4 border-t border-outline-variant/30 flex justify-between items-center">
                            <span class="font-code-data text-[10px] text-outline uppercase">Status: Pending</span>
                            <span class="material-symbols-outlined text-secondary-fixed text-sm">play_circle</span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                
            </div>
            
            <div class="text-center mt-12">
                <a href="/study-planner.php" class="inline-flex items-center gap-2 text-outline hover:text-primary-fixed font-code-data text-xs uppercase tracking-widest transition-colors">
                    <span class="material-symbols-outlined text-sm">refresh</span>
                    Generate Another Plan
                </a>
            </div>
        </div>
        
        <?php endif; ?>
    </main>

    <script>
        function showLoading() {
            const form = document.getElementById('planner-form');
            const input = form.querySelector('input');
            if (input.value.trim() !== '') {
                form.style.display = 'none';
                document.getElementById('loading-state').classList.remove('hidden');
            }
        }
    </script>
</body>
</html>
