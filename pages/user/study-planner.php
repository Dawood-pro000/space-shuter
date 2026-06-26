<?php
// pages/user/study-planner.php
$page_title = 'Study Planner | Space Shutter';
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../services/DatabaseService.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: /space-shuter/auth/login');
    exit;
}

$db = DatabaseService::getConnection();
$stmt = $db->prepare("SELECT subscription_tier FROM users WHERE id = :id");
$stmt->execute(['id' => $_SESSION['user_id']]);
$user = $stmt->fetch();
$tier = $user['subscription_tier'] ?? 'Free';
?>

<main class="pt-32 pb-24 px-8 min-h-[90vh] max-w-6xl mx-auto relative">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-10 pointer-events-none"></div>

    <div class="relative z-10 mb-16 text-center">
        <h1 class="text-4xl md:text-5xl font-serif font-bold text-white uppercase tracking-widest drop-shadow-md mb-4">Genesis Protocol</h1>
        <p class="text-gray-400 font-light tracking-wide max-w-2xl mx-auto" id="planner-desc">Prepare for the cosmos. Select a curated training regimen designed by elite astronauts, or forge your own path to the stars.</p>
    </div>

    <!-- Selection View -->
    <div id="selection-view" class="transition-opacity duration-500">
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
                </ul>
                <button onclick="generateRoadmap('Orbital Cadet')" class="w-full bg-surface-soft border border-brand-purple text-white text-xs uppercase tracking-widest font-bold py-3 rounded hover:bg-brand-purple transition-all">Select Plan</button>
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
                </ul>
                <button onclick="generateRoadmap('Lunar Pioneer')" class="w-full bg-brand-gold text-black text-xs uppercase tracking-widest font-bold py-3 rounded hover:bg-white transition-all shadow-[0_0_15px_rgba(251,191,36,0.2)]">Select Plan</button>
            </div>

            <!-- Plan 3 -->
            <div class="bg-surface border border-white/5 rounded-xl p-8 hover:border-brand-purple/50 transition-all group relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-brand-purple/10 rounded-bl-full -z-10 group-hover:bg-brand-purple/20 transition-all"></div>
                <div class="text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Elite</div>
                <h3 class="text-2xl font-serif font-bold text-white uppercase tracking-wider mb-4">Deep Space Commander</h3>
                <p class="text-sm text-gray-400 font-light leading-relaxed mb-8">The ultimate 16-week executive regimen for interstellar voyages, crew psychology, and crisis management.</p>
                <ul class="space-y-3 mb-8">
                    <li class="text-sm text-gray-300 flex items-center gap-2"><svg class="w-4 h-4 text-brand-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> 120 Hours of Modules</li>
                    <li class="text-sm text-gray-300 flex items-center gap-2"><svg class="w-4 h-4 text-brand-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Centrifuge Certification</li>
                </ul>
                <button onclick="generateRoadmap('Deep Space Commander')" class="w-full bg-surface-soft border border-brand-purple text-white text-xs uppercase tracking-widest font-bold py-3 rounded hover:bg-brand-purple transition-all">Select Plan</button>
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
                <p class="text-xs text-brand-gold mt-2 font-bold uppercase">Current Tier: <?= htmlspecialchars($tier) ?></p>
            </div>
            <button onclick="activateCustomPlan('<?= htmlspecialchars($tier) ?>')" class="bg-transparent border border-white text-white text-xs uppercase tracking-widest font-bold py-3 px-8 rounded hover:bg-white hover:text-black transition-all whitespace-nowrap">
                Create Custom Plan
            </button>
        </div>
    </div>

    <!-- Roadmap View (Hidden initially) -->
    <div id="roadmap-view" class="hidden relative z-10 max-w-4xl mx-auto opacity-0 transition-opacity duration-500">
        <button onclick="resetPlanner()" class="mb-8 text-sm text-gray-400 hover:text-white flex items-center gap-2"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg> Back to Selection</button>
        
        <div class="bg-surface border border-brand-purple/30 rounded-xl p-10 shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-brand-purple/5 rounded-full blur-3xl pointer-events-none"></div>
            
            <h2 id="roadmap-title" class="text-3xl font-serif font-bold text-brand-gold uppercase tracking-widest mb-2">Roadmap</h2>
            <p id="roadmap-subtitle" class="text-gray-400 mb-10 font-light">Your personalized learning path</p>
            
            <div class="relative border-l border-white/20 ml-4 md:ml-6 space-y-10" id="roadmap-timeline">
                <!-- Timeline items injected here -->
            </div>
        </div>
    </div>

    <!-- Active Module Modal (Hidden initially) -->
    <div id="active-module-modal" class="fixed inset-0 z-[100] hidden bg-black/95 backdrop-blur-xl flex flex-col transition-all duration-500 opacity-0">
        <div class="flex justify-between items-center p-6 border-b border-white/10">
            <div class="flex items-center gap-4">
                <button onclick="closeModule()" class="text-gray-400 hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <div class="flex items-center gap-3">
                    <div class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></div>
                    <span class="text-[10px] font-bold text-red-500 uppercase tracking-widest">Live Module</span>
                </div>
            </div>
            <div class="text-brand-gold font-bold font-serif tracking-widest uppercase">Space Shutter Academy</div>
        </div>
        
        <div class="flex-1 overflow-y-auto p-10 flex flex-col items-center">
            <div class="max-w-4xl w-full">
                <h1 id="module-title" class="text-4xl md:text-5xl font-serif font-bold text-white uppercase tracking-widest mb-6 text-center">Module Title</h1>
                <p id="module-desc" class="text-gray-400 text-lg font-light text-center mb-12">Module Description</p>
                
                <div id="module-video-container" class="w-full aspect-video bg-[#111116] border border-white/10 rounded-xl flex items-center justify-center relative overflow-hidden shadow-[0_0_30px_rgba(126,34,206,0.2)] mb-10 group transition-colors">
                    <iframe id="module-video" class="w-full h-full" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-surface border border-white/5 p-6 rounded-xl">
                        <h3 class="text-sm font-bold text-white uppercase tracking-widest border-b border-white/10 pb-2 mb-4">Module Objectives</h3>
                        <ul class="space-y-3 text-gray-400 font-light text-sm">
                            <li class="flex items-start gap-2"><svg class="w-4 h-4 text-brand-gold mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Comprehend key physics and mathematics underlying the topic.</li>
                            <li class="flex items-start gap-2"><svg class="w-4 h-4 text-brand-gold mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Analyze historical telemetry and mission data.</li>
                            <li class="flex items-start gap-2"><svg class="w-4 h-4 text-brand-gold mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Complete the interactive simulator scenario.</li>
                        </ul>
                    </div>
                    <div class="bg-surface border border-white/5 p-6 rounded-xl flex flex-col justify-center text-center">
                        <div id="completion-status" class="text-4xl font-serif font-bold text-white mb-2 transition-all">0%</div>
                        <div class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-6">Completion Status</div>
                        <button id="assessment-btn" onclick="startAssessment()" class="bg-brand-purple hover:bg-brand-purple-deep text-white text-xs font-bold uppercase tracking-widest py-3 px-6 rounded transition-all shadow-[0_0_15px_rgba(126,34,206,0.3)] w-full">Begin Assessment</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<script>
const planData = {
    'Orbital Cadet': [
        { week: 'Week 1', title: 'Introduction to Orbital Mechanics', desc: 'Learn the fundamentals of gravity, orbits, and Kepler\'s laws.', yt: '86YLFOog4GM' },
        { week: 'Week 2', title: 'Spacecraft Systems 101', desc: 'Anatomy of a rocket and life support systems basics.', yt: 'weBPEY9uudY' },
        { week: 'Week 3', title: 'Zero-G Adaptation', desc: 'Physical and mental preparation for weightlessness.', yt: '21X5lGlDOfg' },
        { week: 'Week 4', title: 'Final Simulation & Assessment', desc: 'Test your knowledge in a virtual LEO mission.', yt: 's1HA9LlFNM0' }
    ],
    'Lunar Pioneer': [
        { week: 'Week 1-2', title: 'Advanced Navigation', desc: 'Plotting courses using stellar navigation and telemetry.', yt: 'tI6B1mB2I6c' },
        { week: 'Week 3-4', title: 'Lunar Surface Operations', desc: 'Rover driving, EVA suits, and regolith properties.', yt: '86YLFOog4GM' },
        { week: 'Week 5-6', title: 'Resource Extraction', desc: 'ISRU (In-Situ Resource Utilization) for water and oxygen.', yt: 'weBPEY9uudY' },
        { week: 'Week 7-8', title: 'Mission Command', desc: 'Leading a team and handling communication delays.', yt: '21X5lGlDOfg' }
    ],
    'Deep Space Commander': [
        { week: 'Month 1', title: 'Interstellar Physics', desc: 'Deep dive into propulsion methods and radiation shielding.', yt: 's1HA9LlFNM0' },
        { week: 'Month 2', title: 'Crew Psychology', desc: 'Managing stress and conflict in confined spaces over long durations.', yt: 'tI6B1mB2I6c' },
        { week: 'Month 3', title: 'Crisis Management', desc: 'Simulated system failures and emergency protocols.', yt: '86YLFOog4GM' },
        { week: 'Month 4', title: 'Executive Command', desc: 'Making critical decisions and final centrifuge certification.', yt: 'weBPEY9uudY' }
    ],
    'Custom': [
        { week: 'Phase 1', title: 'Custom Module Selection', desc: 'Analyzing user telemetry and assigning tailored content...', yt: '21X5lGlDOfg' },
        { week: 'Phase 2', title: 'Adaptive Learning Path', desc: 'Dynamic modules based on your progression.', yt: 's1HA9LlFNM0' },
        { week: 'Phase 3', title: 'Specialized Simulation', desc: 'VR scenarios crafted for your specific role.', yt: 'tI6B1mB2I6c' }
    ]
};

function generateRoadmap(planName) {
    const selectionView = document.getElementById('selection-view');
    const roadmapView = document.getElementById('roadmap-view');
    const roadmapTimeline = document.getElementById('roadmap-timeline');
    
    document.getElementById('roadmap-title').textContent = planName;
    document.getElementById('planner-desc').textContent = "Your training roadmap is ready. Follow the path below to achieve your certification.";
    
    // Build timeline
    roadmapTimeline.innerHTML = '';
    const modules = planData[planName];
    
    modules.forEach((mod, index) => {
        const item = document.createElement('div');
        item.className = 'relative pl-8 md:pl-12';
        
        // Escape quotes for inline onclick handler
        const safeTitle = mod.title.replace(/'/g, "\\'");
        const safeDesc = mod.desc.replace(/'/g, "\\'");
        const ytId = mod.yt;

        item.innerHTML = `
            <div class="absolute w-4 h-4 bg-brand-purple rounded-full -left-[8px] md:-left-[9px] top-1 shadow-[0_0_10px_rgba(126,34,206,1)] border-2 border-[#111116]"></div>
            <div class="text-brand-gold text-xs font-bold uppercase tracking-widest mb-1">${mod.week}</div>
            <h4 class="text-xl font-bold text-white mb-2">${mod.title}</h4>
            <p class="text-gray-400 font-light text-sm">${mod.desc}</p>
            ${index === 0 ? `<button onclick="startModule('${safeTitle}', '${safeDesc}', '${ytId}')" class="mt-4 bg-brand-purple hover:bg-brand-purple-deep border border-brand-purple text-white text-xs px-6 py-2.5 rounded font-bold uppercase tracking-widest transition-all shadow-[0_0_15px_rgba(126,34,206,0.4)]">Start Module</button>` : `<button onclick="startModule('${safeTitle}', '${safeDesc}', '${ytId}')" class="mt-4 bg-transparent border border-white/20 hover:border-white/50 text-white text-xs px-6 py-2.5 rounded transition-all">Preview Module</button>`}
        `;
        roadmapTimeline.appendChild(item);
    });

    // Animate transition
    selectionView.classList.add('opacity-0');
    setTimeout(() => {
        selectionView.classList.add('hidden');
        roadmapView.classList.remove('hidden');
        setTimeout(() => {
            roadmapView.classList.remove('opacity-0');
        }, 50);
    }, 500);
}

function startModule(title, desc, ytId) {
    const modal = document.getElementById('active-module-modal');
    document.getElementById('module-title').textContent = title;
    document.getElementById('module-desc').textContent = desc;
    document.getElementById('module-video').src = `https://www.youtube.com/embed/${ytId}?autoplay=0&rel=0`;
    
    // Reset Assessment Button
    const btn = document.getElementById('assessment-btn');
    const status = document.getElementById('completion-status');
    btn.textContent = "Begin Assessment";
    btn.className = "bg-brand-purple hover:bg-brand-purple-deep text-white text-xs font-bold uppercase tracking-widest py-3 px-6 rounded transition-all shadow-[0_0_15px_rgba(126,34,206,0.3)] w-full";
    btn.disabled = false;
    status.textContent = "0%";
    status.classList.remove('text-green-400');
    
    modal.classList.remove('hidden');
    void modal.offsetWidth; // trigger reflow
    modal.classList.remove('opacity-0');
    modal.classList.add('opacity-100');
    document.body.style.overflow = 'hidden';
}

function startAssessment() {
    const btn = document.getElementById('assessment-btn');
    const status = document.getElementById('completion-status');
    
    btn.textContent = "Initializing Telemetry...";
    btn.classList.add('animate-pulse');
    
    setTimeout(() => {
        btn.classList.remove('animate-pulse');
        btn.classList.remove('bg-brand-purple', 'hover:bg-brand-purple-deep');
        btn.classList.add('bg-green-600', 'hover:bg-green-700', 'shadow-[0_0_15px_rgba(22,163,74,0.4)]');
        btn.textContent = "Assessment Completed";
        btn.disabled = true;
        
        status.textContent = "100%";
        status.classList.add('text-green-400');
    }, 1500);
}

function closeModule() {
    const modal = document.getElementById('active-module-modal');
    modal.classList.remove('opacity-100');
    modal.classList.add('opacity-0');
    setTimeout(() => {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }, 500);
}

function activateCustomPlan(tier) {
    if (tier.toLowerCase() === 'free' || tier === '') {
        alert("Custom Study Plans require a Pro or Enterprise subscription. Please upgrade your account in Settings.");
        window.location.href = "/space-shuter/subscription";
        return;
    }
    generateRoadmap('Custom');
}

function resetPlanner() {
    const selectionView = document.getElementById('selection-view');
    const roadmapView = document.getElementById('roadmap-view');
    
    document.getElementById('planner-desc').textContent = "Prepare for the cosmos. Select a curated training regimen designed by elite astronauts, or forge your own path to the stars.";
    
    roadmapView.classList.add('opacity-0');
    setTimeout(() => {
        roadmapView.classList.add('hidden');
        selectionView.classList.remove('hidden');
        setTimeout(() => {
            selectionView.classList.remove('opacity-0');
        }, 50);
    }, 500);
}
</script>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
