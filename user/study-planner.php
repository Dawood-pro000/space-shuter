<?php
require_once __DIR__ . '/../api/api.php';
include_once __DIR__ . '/../templates/bootstrap.php';

// In a real app, user auth would happen here.
$user_id = 'user_001'; // Simulated user ID

$plan = null;
$loading = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic'])) {
    $topic = trim($_POST['topic']);
    if (!empty($topic)) {
        $loading = true;
        
        $services = require __DIR__ . '/../config/services.php';
        $geminiKey = $services['gemini']['keys'][0] ?? null;
        
        if ($geminiKey) {
            $prompt = "Create a structured, 3-step learning roadmap for the topic: '{$topic}'. Format the response as a JSON array where each object has 'step' (number), 'title', and 'description'.";
            $geminiUrl = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$geminiKey}";
            
            $payload = [
                "contents" => [["parts" => [["text" => $prompt]]]],
                "generationConfig" => ["responseMimeType" => "application/json"]
            ];
            
            $ch = curl_init($geminiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            $response = curl_exec($ch);
            curl_close($ch);
            
            if ($response) {
                $data = json_decode($response, true);
                $text = $data['candidates'][0]['content']['parts'][0]['text'] ?? '';
                $plan = json_decode($text, true);
            }
        }
        $loading = false;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>AI Study Planner | Project Vision</title>
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
                        canvas: "#ffffff",
                        surface: "#f7f7f7",
                        "surface-soft": "#fafafa",
                        hairline: "#e5e5e5",
                        ink: "#0a0a0a",
                        slate: "#3a3a3c",
                        steel: "#5a5a5c",
                    },
                    fontFamily: {
                        sans: ["Inter", "sans-serif"],
                        mono: ["Geist Mono", "monospace"],
                    },
                    borderRadius: { md: "8px", lg: "12px", full: "9999px" }
                }
            }
        }
    </script>
    <style>
        body { background-color: #ffffff; color: #0a0a0a; font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="antialiased selection:bg-brand-green selection:text-primary min-h-screen flex flex-col bg-surface-soft">

    <!-- Top Navigation -->
    <nav class="fixed top-0 w-full bg-canvas/90 backdrop-blur-md border-b border-hairline z-50 h-[56px] flex items-center px-6 justify-between">
        <div class="flex items-center gap-6">
            <a href="core-discovery.php" class="font-semibold tracking-tight text-lg text-ink">Project Vision</a>
        </div>
        <div class="flex items-center gap-4">
            <a href="core-discovery.php" class="text-sm font-medium text-steel hover:text-ink transition-colors">&larr; Return to Docs</a>
        </div>
    </nav>

    <div class="flex-1 pt-[100px] pb-24 px-6 flex justify-center">
        <div class="w-full max-w-2xl">
            
            <div class="text-center mb-10">
                <span class="bg-[#3772cf]/10 text-[#3772cf] text-[13px] font-semibold px-2.5 py-1 rounded-sm uppercase tracking-[0.5px] mb-4 inline-block">AI Intelligence Feature</span>
                <h1 class="text-[36px] font-semibold text-ink leading-[1.2] tracking-[-0.5px] mb-3">Study Planner</h1>
                <p class="text-[16px] text-slate font-normal">Generate a custom learning roadmap powered by Gemini.</p>
            </div>

            <!-- Input Card -->
            <div class="bg-canvas p-8 rounded-lg border border-hairline shadow-[rgba(0,0,0,0.04)_0px_4px_12px_0px] mb-8">
                <form action="study-planner.php" method="POST">
                    <label class="block text-[14px] font-medium text-ink mb-2">What aerospace or orbital topic do you want to learn?</label>
                    <div class="flex gap-3">
                        <input type="text" name="topic" required placeholder="e.g., Orbital Mechanics, Mars Rover Telemetry..." class="flex-1 bg-canvas text-ink text-[16px] border border-hairline rounded-md px-4 h-[40px] focus:outline-none focus:border-brand-green focus:ring-1 focus:ring-brand-green transition-shadow placeholder:text-[#a8a8aa]">
                        <button type="submit" class="bg-primary text-on-primary text-[14px] font-medium rounded-full px-[20px] h-[40px] hover:bg-[#1c1c1e] transition-colors whitespace-nowrap">
                            Generate Plan
                        </button>
                    </div>
                </form>
            </div>

            <?php if ($loading): ?>
            <div class="text-center p-8">
                <p class="text-steel text-sm font-mono animate-pulse">Requesting roadmap generation from Gemini AI...</p>
            </div>
            <?php elseif ($plan && is_array($plan)): ?>
            
            <!-- Result Card -->
            <div class="bg-canvas rounded-lg border border-hairline overflow-hidden">
                <div class="bg-surface px-6 py-4 border-b border-hairline">
                    <h3 class="text-[14px] font-medium text-ink">Your Custom Learning Roadmap</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-6">
                        <?php foreach ($plan as $step): ?>
                        <div class="relative pl-8">
                            <div class="absolute left-0 top-1 w-5 h-5 rounded-full bg-surface border border-hairline flex items-center justify-center text-[10px] font-mono text-steel"><?= htmlspecialchars($step['step'] ?? '*') ?></div>
                            <h4 class="text-[16px] font-semibold text-ink mb-1"><?= htmlspecialchars($step['title'] ?? 'Step') ?></h4>
                            <p class="text-[14px] text-slate leading-[1.5]"><?= htmlspecialchars($step['description'] ?? '') ?></p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

        </div>
    </div>

</body>
</html>
