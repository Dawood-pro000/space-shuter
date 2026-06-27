<?php
// pages/public/home.php
$page_title = 'Space Shutter | Beyond Earth, Into Infinity';
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../services/DatabaseService.php';

$all_posts = [];
try {
    $db = DatabaseService::getConnection();
    $stmt = $db->query("SELECT title, slug, abstract, image_url, publish_date FROM posts WHERE status = 'published' ORDER BY created_at DESC LIMIT 6");
    $all_posts = $stmt->fetchAll();
} catch (Exception $e) {
    // DB unavailable — page still loads for guests, just without dynamic posts
    $all_posts = [];
}

$missions      = array_slice($all_posts, 0, 3);
$destinations  = array_slice($all_posts, 3, 3);

function getRandomFact() {
    $facts = ['Fascinating', 'Incredible', 'Mind-blowing', 'Awe-inspiring', 'Must-see'];
    return $facts[array_rand($facts)];
}
?>

<!-- Hero Section -->
<section class="relative pt-40 pb-32 px-8 min-h-[90vh] flex flex-col items-center justify-center text-center overflow-hidden">
    <!-- Starry background overlay -->
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-30 pointer-events-none"></div>
    
    <!-- Three.js Planet Container -->
    <div id="planet-container" class="absolute inset-0 z-0 flex items-center justify-center pointer-events-none opacity-60"></div>
    
    <div class="relative z-10 max-w-5xl space-y-8 hero-content">
        <h1 class="text-5xl md:text-7xl lg:text-[80px] font-serif font-bold text-white leading-tight uppercase tracking-wide drop-shadow-2xl">
            Explore the <span class="text-brand-purple">Universe</span>
        </h1>
        <p class="text-lg md:text-xl text-gray-300 max-w-3xl mx-auto font-light tracking-wide leading-relaxed">
            Discover the wonders of space. Learn about planets, follow the latest space missions, and explore the mysteries of the cosmos. Welcome to your personal space hub.
        </p>
        
        <div class="flex flex-col sm:flex-row items-center justify-center gap-6 pt-10">
            <a href="/space-shuter/discover" class="bg-brand-purple text-white px-10 py-4 rounded text-sm font-semibold uppercase tracking-widest hover:bg-brand-purple-deep transition-all shadow-[0_0_20px_rgba(126,34,206,0.4)] hover:shadow-[0_0_40px_rgba(126,34,206,0.8)] border border-brand-purple hover:border-white/20">
                Start Exploring
            </a>
            <a href="#" class="bg-transparent text-white px-10 py-4 rounded text-sm font-semibold uppercase tracking-widest border border-white/30 hover:border-white hover:bg-white/5 transition-all backdrop-blur-sm">
                Learn More
            </a>
        </div>
    </div>
    
    <!-- Subtle planetary orb effects -->
    <div class="absolute top-1/4 left-1/4 w-32 h-32 rounded-full bg-brand-purple blur-[100px] opacity-30 pointer-events-none"></div>
    <div class="absolute bottom-1/4 right-1/4 w-64 h-64 rounded-full bg-brand-gold blur-[120px] opacity-10 pointer-events-none"></div>
</section>

<!-- Space Missions -->
<section class="max-w-7xl mx-auto px-8 py-24 border-t border-white/5 gsap-section">
    <div class="text-center mb-16 gsap-reveal">
        <h2 class="text-4xl font-serif font-bold text-white uppercase tracking-widest mb-4">Space Missions</h2>
        <p class="text-gray-400 font-light tracking-wide">Learn about incredible journeys beyond Earth's atmosphere and the history of space exploration.</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <?php foreach ($missions as $post): ?>
            <div class="gsap-stagger-item bg-surface-soft border border-white/10 rounded-lg overflow-hidden group hover:border-white/20 transition-all flex flex-col h-full shadow-2xl">
                <div class="h-56 overflow-hidden relative">
                    <img src="<?= htmlspecialchars($post['image_url']) ?>" alt="Mission" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-[10s] ease-out">
                </div>
                <div class="p-8 flex flex-col flex-1">
                    <h3 class="text-xl font-serif font-bold text-white uppercase tracking-wide mb-3 line-clamp-1">
                        <?= htmlspecialchars($post['title']) ?>
                    </h3>
                    <p class="text-sm text-gray-400 line-clamp-3 mb-8 font-light flex-1">
                        <?= htmlspecialchars($post['abstract']) ?>
                    </p>
                    <div class="flex items-center justify-between mt-auto">
                        <span class="text-brand-gold font-bold text-sm tracking-wider"><?= getRandomFact() ?></span>
                        <a href="/space-shuter/article/<?= htmlspecialchars($post['slug']) ?>" class="bg-brand-purple text-white text-xs px-5 py-2.5 rounded font-semibold transition-all hover:bg-brand-purple-deep shadow-[0_0_10px_rgba(126,34,206,0.2)]">Read Article</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <div class="text-center mt-12 gsap-reveal">
        <a href="/space-shuter/discover" class="inline-block bg-brand-purple text-white px-8 py-3 rounded text-sm font-semibold transition-all hover:bg-brand-purple-deep shadow-[0_0_15px_rgba(126,34,206,0.3)] hover:shadow-[0_0_25px_rgba(126,34,206,0.5)] border border-brand-purple hover:border-white/10">See All Missions</a>
    </div>
</section>

<!-- Space Destinations -->
<section class="max-w-7xl mx-auto px-8 py-24 border-t border-white/5 relative gsap-section">
    <div class="text-center mb-16 gsap-reveal">
        <h2 class="text-4xl font-serif font-bold text-white uppercase tracking-widest mb-4">Space Destinations</h2>
        <p class="text-gray-400 font-light tracking-wide">Explore planets, moons, and other amazing locations in our solar system and beyond.</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        <?php foreach ($destinations as $post): ?>
            <div class="gsap-stagger-item bg-surface border border-white/5 rounded-xl overflow-hidden group hover:border-white/10 transition-all shadow-2xl relative p-8">
                <!-- Location Tag -->
                <div class="absolute top-4 left-4 z-10 bg-brand-purple text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full shadow-[0_0_10px_rgba(126,34,206,0.5)]">
                    Featured
                </div>
                
                <div class="flex flex-col md:flex-row items-center gap-8 mb-8">
                    <!-- Rotating Planet Image -->
                    <div class="w-48 h-48 rounded-full overflow-hidden shrink-0 shadow-[inset_-10px_-10px_20px_rgba(0,0,0,0.8),_0_0_30px_rgba(126,34,206,0.2)] animate-[spin_40s_linear_infinite] group-hover:shadow-[inset_-10px_-10px_20px_rgba(0,0,0,0.8),_0_0_50px_rgba(126,34,206,0.5)] transition-shadow">
                        <img src="<?= htmlspecialchars($post['image_url']) ?>" alt="Destination" class="w-full h-full object-cover scale-110">
                    </div>
                    
                    <div>
                        <h3 class="text-3xl font-serif font-bold text-white uppercase tracking-wider drop-shadow-md mb-4">
                            <?= htmlspecialchars($post['title']) ?>
                        </h3>
                        
                        <div class="grid grid-cols-2 gap-4 pb-4 border-b border-white/10">
                            <div>
                                <div class="text-[10px] text-gray-500 uppercase tracking-widest mb-1">Type</div>
                                <div class="text-sm text-gray-200">Planet / Moon</div>
                            </div>
                            <div>
                                <div class="text-[10px] text-gray-500 uppercase tracking-widest mb-1">Status</div>
                                <div class="text-sm text-brand-gold font-bold">Explored</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <p class="text-sm text-gray-400 font-light line-clamp-2 mb-8">
                        <?= htmlspecialchars($post['abstract']) ?>
                    </p>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-brand-gold font-bold text-lg tracking-wider"><?= getRandomFact() ?></span>
                        <a href="/space-shuter/planet/detail?id=<?= strtolower(htmlspecialchars($post['title'])) ?>" class="bg-brand-purple/20 border border-brand-purple text-white text-xs uppercase tracking-wider px-6 py-2.5 rounded font-semibold transition-all hover:bg-brand-purple shadow-[0_0_10px_rgba(126,34,206,0.2)]">Explore</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <div class="text-center mt-16 gsap-reveal">
        <a href="/space-shuter/planet" class="inline-block bg-surface-soft border border-brand-purple/50 text-white px-8 py-3 rounded text-sm font-semibold transition-all hover:bg-brand-purple shadow-[0_0_15px_rgba(126,34,206,0.1)] hover:shadow-[0_0_25px_rgba(126,34,206,0.3)]">Explore All Destinations</a>
    </div>
</section>

<!-- Latest Space News -->
<section class="max-w-7xl mx-auto px-8 py-24 border-t border-white/5 gsap-section">
    <div class="text-center mb-16 gsap-reveal">
        <h2 class="text-4xl font-serif font-bold text-white uppercase tracking-widest mb-4">Latest Discoveries</h2>
        <p class="text-gray-400 font-light tracking-wide">Stay updated with the latest breakthroughs and news in space exploration.</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="gsap-stagger-item bg-surface border border-white/5 rounded-xl overflow-hidden group hover:border-brand-purple/30 transition-all flex flex-col justify-end p-8 min-h-[400px] relative shadow-2xl">
            <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=1200&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover opacity-40 group-hover:opacity-60 group-hover:scale-105 transition-all duration-700 z-0">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/80 to-transparent z-0"></div>
            <div class="relative z-10">
                <span class="text-brand-purple font-bold tracking-widest text-xs uppercase mb-2 block">Astronomy</span>
                <h3 class="text-3xl font-serif font-bold text-white mb-4">James Webb Telescope Captures New Star Birth</h3>
                <p class="text-gray-300 font-light mb-6 line-clamp-2">The latest images from the James Webb Space Telescope reveal unprecedented details of star formation in the Carina Nebula.</p>
                <a href="/space-shuter/discover" class="text-white text-sm font-bold tracking-widest uppercase hover:text-brand-purple transition-colors flex items-center gap-2">Read Full Story <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a>
            </div>
        </div>
        <div class="flex flex-col gap-8">
            <div class="gsap-stagger-item bg-surface-soft border border-white/5 rounded-xl p-6 flex gap-6 group hover:border-white/20 transition-all">
                <div class="w-32 h-32 rounded-lg overflow-hidden shrink-0">
                    <img src="https://images.unsplash.com/photo-1541873676-a18131494184?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="flex flex-col justify-center">
                    <span class="text-brand-gold font-bold tracking-widest text-[10px] uppercase mb-1">Mars Mission</span>
                    <h4 class="text-lg font-serif font-bold text-white mb-2">Perseverance Finds Ancient Riverbed</h4>
                    <a href="/space-shuter/discover" class="text-gray-400 text-xs uppercase tracking-widest hover:text-brand-purple mt-auto">Read More</a>
                </div>
            </div>
            <div class="gsap-stagger-item bg-surface-soft border border-white/5 rounded-xl p-6 flex gap-6 group hover:border-white/20 transition-all">
                <div class="w-32 h-32 rounded-lg overflow-hidden shrink-0">
                    <img src="https://images.unsplash.com/photo-1614728894747-a83421e2b9c9?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="flex flex-col justify-center">
                    <span class="text-brand-purple font-bold tracking-widest text-[10px] uppercase mb-1">Solar System</span>
                    <h4 class="text-lg font-serif font-bold text-white mb-2">New Rings Discovered Around Asteroid Chariklo</h4>
                    <a href="/space-shuter/discover" class="text-gray-400 text-xs uppercase tracking-widest hover:text-brand-purple mt-auto">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Interactive Study & Academy -->
<section class="max-w-7xl mx-auto px-8 py-24 border-t border-white/5 gsap-section relative">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-brand-purple/5 via-transparent to-transparent pointer-events-none"></div>
    <div class="text-center mb-16 gsap-reveal relative z-10">
        <h2 class="text-4xl font-serif font-bold text-white uppercase tracking-widest mb-4">Space Academy</h2>
        <p class="text-gray-400 font-light tracking-wide">Test your knowledge and follow structured learning paths about the cosmos.</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative z-10">
        <div class="gsap-stagger-item bg-surface-soft border border-brand-purple/20 rounded-xl p-8 hover:bg-brand-purple/10 hover:border-brand-purple/50 transition-all text-center group shadow-[0_0_30px_rgba(126,34,206,0.1)]">
            <div class="w-16 h-16 rounded-full bg-brand-purple/20 flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                <svg class="w-8 h-8 text-brand-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            </div>
            <h3 class="text-xl font-serif font-bold text-white uppercase tracking-wider mb-3">Study Modules</h3>
            <p class="text-sm text-gray-400 font-light mb-6">Complete structured courses on orbital mechanics, astrophysics, and planetary science.</p>
            <a href="/space-shuter/study-planner" class="text-brand-purple text-xs font-bold uppercase tracking-widest hover:text-white transition-colors">Start Learning →</a>
        </div>
        
        <div class="gsap-stagger-item bg-surface-soft border border-white/10 rounded-xl p-8 hover:bg-white/5 hover:border-white/30 transition-all text-center group">
            <div class="w-16 h-16 rounded-full bg-white/5 flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
            </div>
            <h3 class="text-xl font-serif font-bold text-white uppercase tracking-wider mb-3">Assessments</h3>
            <p class="text-sm text-gray-400 font-light mb-6">Test your space knowledge with interactive quizzes and earn achievements.</p>
            <a href="/space-shuter/study-planner" class="text-gray-300 text-xs font-bold uppercase tracking-widest hover:text-white transition-colors">Take a Quiz →</a>
        </div>
        
        <div class="gsap-stagger-item bg-surface-soft border border-brand-gold/20 rounded-xl p-8 hover:bg-brand-gold/10 hover:border-brand-gold/50 transition-all text-center group shadow-[0_0_30px_rgba(251,191,36,0.1)]">
            <div class="w-16 h-16 rounded-full bg-brand-gold/20 flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                <svg class="w-8 h-8 text-brand-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
            </div>
            <h3 class="text-xl font-serif font-bold text-white uppercase tracking-wider mb-3">E.V.A Assistant</h3>
            <p class="text-sm text-gray-400 font-light mb-6">Ask our AI companion any question about the universe and get real-time answers.</p>
            <a href="/space-shuter/assistant" class="text-brand-gold text-xs font-bold uppercase tracking-widest hover:text-white transition-colors">Ask E.V.A →</a>
        </div>
    </div>
</section>


<script>
document.addEventListener("DOMContentLoaded", () => {
    // --- 1. Three.js Rotating Planet (Sci-fi Wireframe Sphere) ---
    const container = document.getElementById('planet-container');
    if (container && typeof THREE !== 'undefined') {
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
        
        renderer.setSize(window.innerWidth, window.innerHeight);
        container.appendChild(renderer.domElement);
        
        // Create a geometric sphere
        const geometry = new THREE.IcosahedronGeometry(4, 2);
        
        // Add particles at vertices
        const particlesMaterial = new THREE.PointsMaterial({
            color: 0x7e22ce, // Brand purple
            size: 0.05,
            transparent: true,
            opacity: 0.8
        });
        const particleSystem = new THREE.Points(geometry, particlesMaterial);
        
        // Add wireframe
        const wireframeMaterial = new THREE.LineBasicMaterial({
            color: 0x581c87, // Deep brand purple
            transparent: true,
            opacity: 0.2
        });
        const wireframe = new THREE.LineSegments(new THREE.WireframeGeometry(geometry), wireframeMaterial);
        
        scene.add(particleSystem);
        scene.add(wireframe);
        
        camera.position.z = 10;
        
        // Subtle Mouse Interaction
        let mouseX = 0;
        let mouseY = 0;
        document.addEventListener('mousemove', (event) => {
            mouseX = (event.clientX / window.innerWidth) * 2 - 1;
            mouseY = -(event.clientY / window.innerHeight) * 2 + 1;
        });
        
        function animatePlanet() {
            requestAnimationFrame(animatePlanet);
            // Auto rotation
            particleSystem.rotation.y += 0.001;
            wireframe.rotation.y += 0.001;
            
            // Mouse influence
            particleSystem.rotation.x += (mouseY * 0.5 - particleSystem.rotation.x) * 0.05;
            particleSystem.rotation.y += (mouseX * 0.5 - particleSystem.rotation.y) * 0.05;
            wireframe.rotation.x = particleSystem.rotation.x;
            
            renderer.render(scene, camera);
        }
        animatePlanet();
        
        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });
    }

    // --- 2. GSAP Apple-Style Animations ---
    if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
        // Hero Section Animation (On Load)
        gsap.fromTo(".hero-content", 
            { y: 50, opacity: 0 },
            { y: 0, opacity: 1, duration: 1.5, ease: "power3.out", delay: 0.2 }
        );
        
        gsap.fromTo("#planet-container",
            { scale: 0.8, opacity: 0 },
            { scale: 1, opacity: 0.6, duration: 2, ease: "power2.out" }
        );

        // Scroll Reveal Animations
        gsap.utils.toArray(".gsap-section").forEach(section => {
            // Reveal Titles
            const reveals = section.querySelectorAll('.gsap-reveal');
            if(reveals.length > 0) {
                gsap.fromTo(reveals, 
                    { y: 40, opacity: 0 },
                    { 
                        scrollTrigger: {
                            trigger: section,
                            start: "top 80%",
                        },
                        y: 0, opacity: 1, duration: 1, stagger: 0.2, ease: "power3.out"
                    }
                );
            }
            
            // Stagger Grid Items
            const items = section.querySelectorAll('.gsap-stagger-item');
            if(items.length > 0) {
                gsap.fromTo(items,
                    { y: 50, opacity: 0, scale: 0.95 },
                    {
                        scrollTrigger: {
                            trigger: items[0],
                            start: "top 85%",
                        },
                        y: 0, opacity: 1, scale: 1, duration: 0.8, stagger: 0.15, ease: "back.out(1.2)"
                    }
                );
            }
        });
    }
});
</script>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
