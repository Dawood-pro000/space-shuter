<?php
// pages/public/planet.php
$page_title = 'Space Destinations | Space Shutter';
require_once __DIR__ . '/../../layouts/header.php';

$destinations = [
    [
        'id' => 'mercury',
        'name' => 'Mercury',
        'type' => 'Terrestrial Planet',
        'image' => 'https://images.unsplash.com/photo-1614728894747-a83421e2b9c9?q=80&w=1000&auto=format&fit=crop', // Replace with proper Mercury pic if needed
        'desc' => 'The smallest planet in our solar system and nearest to the Sun, Mercury is only slightly larger than Earth\'s Moon.',
        'missions' => ['Mariner 10', 'MESSENGER', 'BepiColombo']
    ],
    [
        'id' => 'venus',
        'name' => 'Venus',
        'type' => 'Terrestrial Planet',
        'image' => 'https://images.unsplash.com/photo-1614730321146-b6fa6a46bcb4?q=80&w=1000&auto=format&fit=crop', // Replace with proper Venus pic
        'desc' => 'Venus is the second planet from the Sun and is Earth’s closest planetary neighbor. It’s one of the four inner, terrestrial planets.',
        'missions' => ['Venera', 'Magellan', 'Akatsuki', 'Parker Solar Probe']
    ],
    [
        'id' => 'earth',
        'name' => 'Earth',
        'type' => 'Terrestrial Planet',
        'image' => 'https://images.unsplash.com/photo-1614730321146-b6fa6a46bcb4?q=80&w=1000&auto=format&fit=crop',
        'desc' => 'Our home planet is the third planet from the Sun, and the only place we know of so far that’s inhabited by living things.',
        'missions' => ['ISS', 'Hubble', 'James Webb (Orbiting L2)']
    ],
    [
        'id' => 'mars',
        'name' => 'Mars',
        'type' => 'Terrestrial Planet',
        'image' => 'https://images.unsplash.com/photo-1614730321146-b6fa6a46bcb4?q=80&w=1000&auto=format&fit=crop',
        'desc' => 'The Red Planet, home to the largest volcano in the solar system, Olympus Mons.',
        'missions' => ['Curiosity Rover', 'Perseverance Rover', 'Ingenuity Helicopter']
    ],
    [
        'id' => 'jupiter',
        'name' => 'Jupiter',
        'type' => 'Gas Giant',
        'image' => 'https://images.unsplash.com/photo-1614732414444-096e5f1122d5?q=80&w=1000&auto=format&fit=crop',
        'desc' => 'The largest planet in our solar system, famous for its Great Red Spot and dozens of moons.',
        'missions' => ['Galileo', 'Juno', 'Voyager 1 & 2', 'Cassini-Huygens']
    ],
    [
        'id' => 'saturn',
        'name' => 'Saturn',
        'type' => 'Gas Giant',
        'image' => 'https://images.unsplash.com/photo-1614728894747-a83421e2b9c9?q=80&w=1000&auto=format&fit=crop',
        'desc' => 'Adorned with a dazzling, complex system of icy rings, Saturn is unique in our solar system.',
        'missions' => ['Cassini', 'Voyager 1 & 2', 'Pioneer 11']
    ],
    [
        'id' => 'uranus',
        'name' => 'Uranus',
        'type' => 'Ice Giant',
        'image' => 'https://images.unsplash.com/photo-1614732414444-096e5f1122d5?q=80&w=1000&auto=format&fit=crop',
        'desc' => 'Uranus is the seventh planet from the Sun, and has the third-largest diameter in our solar system. It appears to spin on its side.',
        'missions' => ['Voyager 2']
    ],
    [
        'id' => 'neptune',
        'name' => 'Neptune',
        'type' => 'Ice Giant',
        'image' => 'https://images.unsplash.com/photo-1614728894747-a83421e2b9c9?q=80&w=1000&auto=format&fit=crop',
        'desc' => 'Dark, cold, and whipped by supersonic winds, ice giant Neptune is the eighth and most distant planet in our solar system.',
        'missions' => ['Voyager 2']
    ]
];
?>

<main class="pt-32 pb-24 px-8 max-w-7xl mx-auto min-h-[90vh]">
    <div class="text-center mb-16 relative z-10">
        <h1 class="text-5xl font-serif font-bold text-white uppercase tracking-widest mb-6">Space <span class="text-brand-purple">Destinations</span></h1>
        <p class="text-gray-400 font-light tracking-wide max-w-2xl mx-auto">Explore the 8 planets of our solar system, their moons, and the incredible missions that have ventured there.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
        <?php foreach ($destinations as $dest): ?>
            <a href="/space-shuter/planet-detail?id=<?= $dest['id'] ?>" class="block bg-surface border border-white/5 rounded-2xl overflow-hidden group hover:border-white/20 transition-all shadow-2xl flex flex-col md:flex-row relative hover:shadow-[0_0_30px_rgba(126,34,206,0.3)]">
                
                <!-- Image Section -->
                <div class="w-full md:w-2/5 h-64 md:h-auto overflow-hidden relative flex items-center justify-center p-4 bg-black">
                    <img src="<?= htmlspecialchars($dest['image']) ?>" alt="<?= htmlspecialchars($dest['name']) ?>" class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-700">
                </div>
                
                <!-- Content Section -->
                <div class="w-full md:w-3/5 p-8 flex flex-col z-10 bg-gradient-to-t md:bg-gradient-to-r from-surface via-surface to-transparent">
                    <div class="text-[10px] text-brand-purple font-bold uppercase tracking-wider mb-2"><?= htmlspecialchars($dest['type']) ?></div>
                    <h2 class="text-3xl font-serif font-bold text-white mb-3 tracking-wide flex items-center gap-2">
                        <?= htmlspecialchars($dest['name']) ?>
                        <svg class="w-5 h-5 text-gray-500 group-hover:text-brand-purple transition-colors opacity-0 group-hover:opacity-100 transform -translate-x-4 group-hover:translate-x-0 duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </h2>
                    <p class="text-sm text-gray-400 font-light mb-6 flex-1"><?= htmlspecialchars($dest['desc']) ?></p>
                    
                    <div>
                        <h3 class="text-xs font-semibold text-white uppercase tracking-widest mb-3 border-b border-white/10 pb-2">Notable Missions</h3>
                        <ul class="flex flex-wrap gap-2">
                            <?php foreach ($dest['missions'] as $mission): ?>
                                <li class="text-[10px] bg-white/5 border border-white/10 text-gray-300 px-2 py-1 rounded flex items-center gap-1">
                                    <svg class="w-3 h-3 text-brand-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                    <?= htmlspecialchars($mission) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

            </a>
        <?php endforeach; ?>
    </div>
</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
