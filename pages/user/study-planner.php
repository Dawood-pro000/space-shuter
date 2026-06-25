<?php
// pages/user/study-planner.php
$page_title = 'Genesis Training | Space Shutter';
require_once __DIR__ . '/../../layouts/header.php';
?>

<main class="pt-32 pb-24 px-8 min-h-[90vh] max-w-6xl mx-auto relative">
    <!-- Starry background overlay -->
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-10 pointer-events-none"></div>

    <div class="relative z-10 mb-16 text-center">
        <h1 class="text-4xl md:text-5xl font-serif font-bold text-white uppercase tracking-widest drop-shadow-md mb-4">Genesis Protocol</h1>
        <p class="text-gray-400 font-light tracking-wide max-w-2xl mx-auto">Prepare for the cosmos. Select a curated training regimen designed by elite astronauts, or forge your own path to the stars.</p>
    </div>

    <div class="relative z-10 grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
        <!-- Plan 1 -->
        <div class="bg-surface border border-white/5 rounded-xl p-8 hover:border-brand-purple/50 transition-all group relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-brand-purple/10 rounded-bl-full -z-10 group-hover:bg-brand-purple/20 transition-all"></div>
            <div class="text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Standard</div>
            <h3 class="text-2xl font-serif font-bold text-white uppercase tracking-wider mb-4">Orbital Cadet</h3>
            <p class="text-sm text-gray-400 font-light leading-relaxed mb-8">A 4-week foundational course covering basic orbital mechanics, zero-G adaptation, and spacecraft systems.</p>
            <ul class="space-y-3 mb-8">
                <li class="text-sm text-gray-300 flex items-center gap-2"><svg class="w-4 h-4 text-brand-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> 20 Hours of Modules</li>
                <li class="text-sm text-gray-300 flex items-center gap-2"><svg class="w-4 h-4 text-brand-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Basic Simulator Access</li>
                <li class="text-sm text-gray-300 flex items-center gap-2"><svg class="w-4 h-4 text-brand-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Written Assessment</li>
            </ul>
            <button class="w-full bg-surface-soft border border-brand-purple text-white text-xs uppercase tracking-widest font-bold py-3 rounded hover:bg-brand-purple transition-all shadow-[0_0_15px_rgba(126,34,206,0.1)] hover:shadow-[0_0_20px_rgba(126,34,206,0.4)]">Select Plan</button>
        </div>

        <!-- Plan 2 -->
        <div class="bg-[#111116] border border-brand-gold/40 rounded-xl p-8 hover:border-brand-gold transition-all group relative overflow-hidden shadow-[0_0_30px_rgba(251,191,36,0.05)] transform md:-translate-y-4">
            <div class="absolute top-0 right-0 w-24 h-24 bg-brand-gold/5 rounded-bl-full -z-10 group-hover:bg-brand-gold/10 transition-all"></div>
            <div class="inline-block bg-brand-gold text-black text-[9px] font-bold uppercase tracking-widest px-2 py-1 rounded mb-2">Recommended</div>
            <h3 class="text-2xl font-serif font-bold text-white uppercase tracking-wider mb-4">Lunar Pioneer</h3>
            <p class="text-sm text-gray-400 font-light leading-relaxed mb-8">An intensive 8-week program focused on lunar surface operations, resource extraction, and advanced navigation.</p>
            <ul class="space-y-3 mb-8">
                <li class="text-sm text-gray-300 flex items-center gap-2"><svg class="w-4 h-4 text-brand-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> 50 Hours of Modules</li>
                <li class="text-sm text-gray-300 flex items-center gap-2"><svg class="w-4 h-4 text-brand-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Advanced VR Simulator</li>
                <li class="text-sm text-gray-300 flex items-center gap-2"><svg class="w-4 h-4 text-brand-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Mission Control Comms</li>
            </ul>
            <button class="w-full bg-brand-gold text-black text-xs uppercase tracking-widest font-bold py-3 rounded hover:bg-white transition-all shadow-[0_0_15px_rgba(251,191,36,0.2)]">Select Plan</button>
        </div>

        <!-- Plan 3 -->
        <div class="bg-surface border border-white/5 rounded-xl p-8 hover:border-brand-purple/50 transition-all group relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-brand-purple/10 rounded-bl-full -z-10 group-hover:bg-brand-purple/20 transition-all"></div>
            <div class="text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Elite</div>
            <h3 class="text-2xl font-serif font-bold text-white uppercase tracking-wider mb-4">Deep Space Commander</h3>
            <p class="text-sm text-gray-400 font-light leading-relaxed mb-8">The ultimate 16-week executive regimen for interstellar voyages, crew psychology, and crisis management.</p>
            <ul class="space-y-3 mb-8">
                <li class="text-sm text-gray-300 flex items-center gap-2"><svg class="w-4 h-4 text-brand-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> 120 Hours of Modules</li>
                <li class="text-sm text-gray-300 flex items-center gap-2"><svg class="w-4 h-4 text-brand-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Private Astronaut Coach</li>
                <li class="text-sm text-gray-300 flex items-center gap-2"><svg class="w-4 h-4 text-brand-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Centrifuge Certification</li>
            </ul>
            <button class="w-full bg-surface-soft border border-brand-purple text-white text-xs uppercase tracking-widest font-bold py-3 rounded hover:bg-brand-purple transition-all shadow-[0_0_15px_rgba(126,34,206,0.1)] hover:shadow-[0_0_20px_rgba(126,34,206,0.4)]">Select Plan</button>
        </div>
    </div>

    <!-- Custom Plan Divider -->
    <div class="relative flex py-8 items-center justify-center z-10 mb-8">
        <div class="flex-grow border-t border-white/10"></div>
        <span class="flex-shrink-0 mx-4 text-gray-500 text-xs uppercase tracking-widest font-bold">OR</span>
        <div class="flex-grow border-t border-white/10"></div>
    </div>

    <!-- Custom Plan Builder -->
    <div class="relative z-10 bg-surface border border-white/10 rounded-xl p-10 flex flex-col md:flex-row items-center justify-between gap-8">
        <div class="max-w-xl">
            <h3 class="text-2xl font-serif font-bold text-white uppercase tracking-wider mb-2">Forge Your Own Path</h3>
            <p class="text-sm text-gray-400 font-light leading-relaxed">Customize a study plan tailored to your specific aerospace interests. Select modules, define your pace, and track your telemetry.</p>
        </div>
        <button class="bg-transparent border border-white text-white text-xs uppercase tracking-widest font-bold py-3 px-8 rounded hover:bg-white hover:text-black transition-all whitespace-nowrap">
            Create Custom Plan
        </button>
    </div>

</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
