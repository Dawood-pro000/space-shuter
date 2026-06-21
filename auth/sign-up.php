<?php
require_once __DIR__ . '/../api/api.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Demo implementation
    $error = "Registration is currently closed for the alpha release.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Register | Project Vision</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#0a0a0a",
                        "on-primary": "#ffffff",
                        "brand-green": "#00d4a4",
                        "brand-error": "#d45656",
                        canvas: "#ffffff",
                        surface: "#f7f7f7",
                        hairline: "#e5e5e5",
                        ink: "#0a0a0a",
                        slate: "#3a3a3c",
                        steel: "#5a5a5c",
                    },
                    fontFamily: { sans: ["Inter", "sans-serif"] },
                    borderRadius: { md: "8px", lg: "12px", full: "9999px" }
                }
            }
        }
    </script>
</head>
<body class="bg-surface min-h-screen flex items-center justify-center font-sans text-ink p-6 selection:bg-brand-green selection:text-primary">

    <div class="w-full max-w-md bg-canvas p-8 rounded-lg border border-hairline shadow-[rgba(0,0,0,0.04)_0px_4px_12px_0px]">
        <div class="text-center mb-8">
            <h1 class="text-[28px] font-semibold tracking-tight text-ink mb-2">Create an account</h1>
            <p class="text-slate text-[16px]">Join Project Vision to access telemetry logs.</p>
        </div>

        <?php if (isset($error)): ?>
        <div class="mb-6 p-3 bg-[#d45656]/10 border border-[#d45656]/20 rounded-md text-[#d45656] text-[14px] font-medium text-center">
            <?= htmlspecialchars($error) ?>
        </div>
        <?php endif; ?>

        <form action="sign-up.php" method="POST" class="space-y-5">
            <div>
                <label class="block text-[14px] font-medium text-ink mb-1.5">Full Name <span class="bg-brand-error text-white text-[11px] font-semibold px-1.5 py-0.5 rounded-sm uppercase tracking-[0.5px] ml-1">Required</span></label>
                <input type="text" name="name" required class="w-full bg-canvas text-ink text-[16px] border border-hairline rounded-md px-4 h-[40px] focus:outline-none focus:border-brand-green focus:ring-1 focus:ring-brand-green transition-shadow placeholder:text-[#a8a8aa]" placeholder="Jane Doe"/>
            </div>

            <div>
                <label class="block text-[14px] font-medium text-ink mb-1.5">Email address <span class="bg-brand-error text-white text-[11px] font-semibold px-1.5 py-0.5 rounded-sm uppercase tracking-[0.5px] ml-1">Required</span></label>
                <input type="email" name="email" required class="w-full bg-canvas text-ink text-[16px] border border-hairline rounded-md px-4 h-[40px] focus:outline-none focus:border-brand-green focus:ring-1 focus:ring-brand-green transition-shadow placeholder:text-[#a8a8aa]" placeholder="operator@projectvision.com"/>
            </div>
            
            <div>
                <label class="block text-[14px] font-medium text-ink mb-1.5">Password <span class="bg-brand-error text-white text-[11px] font-semibold px-1.5 py-0.5 rounded-sm uppercase tracking-[0.5px] ml-1">Required</span></label>
                <input type="password" name="password" required class="w-full bg-canvas text-ink text-[16px] border border-hairline rounded-md px-4 h-[40px] focus:outline-none focus:border-brand-green focus:ring-1 focus:ring-brand-green transition-shadow placeholder:text-[#a8a8aa]" placeholder="••••••••"/>
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full bg-primary text-on-primary text-[14px] font-medium rounded-full py-[10px] px-[20px] hover:bg-[#1c1c1e] transition-colors">
                    Create account
                </button>
            </div>
        </form>

        <div class="mt-8 text-center">
            <span class="text-steel text-[14px]">Already have an account? </span>
            <a href="login.php" class="text-[14px] font-medium text-ink hover:text-brand-green transition-colors">Sign in</a>
        </div>
    </div>

</body>
</html>