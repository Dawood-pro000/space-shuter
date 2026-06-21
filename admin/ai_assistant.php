<?php
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: ../auth/login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Co-Pilot Terminal | Project Vision</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Geist+Mono:wght@400;500&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#0a0a0a",
                        "on-primary": "#ffffff",
                        canvas: "#ffffff",
                        surface: "#f7f7f7",
                        "surface-code": "#1c1c1e",
                        hairline: "#e5e5e5",
                        "hairline-dark": "#3a3a3c",
                        ink: "#0a0a0a",
                        slate: "#3a3a3c",
                        steel: "#5a5a5c",
                        "on-dark": "#ffffff",
                        "on-dark-muted": "#b3b3b3",
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
</head>
<body class="antialiased selection:bg-surface-code selection:text-white min-h-screen flex bg-surface">

    <!-- Sidebar -->
    <aside class="w-[240px] fixed left-0 top-0 bottom-0 bg-canvas border-r border-hairline p-4 flex flex-col justify-between">
        <div class="space-y-6 mt-4">
            <div class="px-3">
                <span class="font-semibold tracking-tight text-lg text-ink">Project Vision</span>
            </div>
            
            <nav class="space-y-1">
                <a href="dashboard.php" class="block px-3 py-1.5 rounded-sm text-sm text-steel hover:text-ink transition-colors">Overview</a>
                <a href="ai_assistant.php" class="block px-3 py-1.5 rounded-sm text-sm font-medium bg-surface text-ink">Co-Pilot AI</a>
                <a href="../user/core-discovery.php" class="block px-3 py-1.5 rounded-sm text-sm text-steel hover:text-ink transition-colors">Documentation</a>
            </nav>
        </div>
        
        <div class="px-3 mb-4">
            <a href="../auth/logout.php" class="text-[13px] font-medium text-steel hover:text-[#d45656] transition-colors">Sign out</a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 ml-[240px] p-10 max-w-4xl flex flex-col h-screen">
        <header class="mb-8">
            <h1 class="text-[36px] font-semibold text-ink leading-[1.2] tracking-[-0.5px] mb-2">Co-Pilot Terminal</h1>
            <p class="text-[16px] text-slate font-normal">Directly interface with the Key #3 administrative AI model.</p>
        </header>

        <!-- Chat / Terminal Area -->
        <div class="flex-1 bg-surface-code rounded-lg border border-hairline-dark overflow-hidden flex flex-col shadow-[rgba(0,0,0,0.1)_0px_10px_30px_0px]">
            
            <!-- Terminal Header -->
            <div class="bg-primary px-4 py-2 border-b border-hairline-dark flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#d45656]"></span>
                    <span class="w-2.5 h-2.5 rounded-full bg-[#c37d0d]"></span>
                    <span class="w-2.5 h-2.5 rounded-full bg-[#1ba673]"></span>
                </div>
                <div class="text-[12px] font-mono text-on-dark-muted">system@copilot: ~</div>
            </div>

            <!-- Messages -->
            <div class="flex-1 p-6 overflow-y-auto space-y-6">
                <div class="flex items-start gap-4">
                    <div class="w-8 h-8 rounded-md bg-canvas flex items-center justify-center shrink-0 border border-hairline-dark">
                        <span class="text-[14px]">🤖</span>
                    </div>
                    <div class="text-on-dark font-mono text-[14px] leading-[1.5]">
                        <span class="text-[#00d4a4]">System Engine [Key #3]:</span> 
                        Terminal baseline connection stable. I am synchronized with your environmental settings matrix and Supabase core. What architectural adjustment or debugging task do we need to inspect?
                    </div>
                </div>
            </div>

            <!-- Input Area -->
            <div class="p-4 border-t border-hairline-dark bg-primary">
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#00d4a4] font-mono text-[14px]">></span>
                    <input type="text" placeholder="Query system diagnostics, schema adjustments..." class="w-full bg-surface-code text-on-dark font-mono text-[14px] rounded-md border border-hairline-dark focus:outline-none focus:border-[#00d4a4] focus:ring-1 focus:ring-[#00d4a4] py-3 pl-10 pr-24 placeholder:text-on-dark-muted">
                    <button class="absolute right-2 top-1/2 -translate-y-1/2 bg-canvas text-ink px-4 py-1.5 rounded-sm text-[13px] font-semibold hover:bg-surface transition-colors">
                        Send
                    </button>
                </div>
            </div>
            
        </div>
    </main>

</body>
</html>
