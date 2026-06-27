<?php
// pages/public/planet-detail.php
$planet_id = $_GET['id'] ?? 'mars';

// Detailed data for planets
$planet_data = [
    'mercury' => [
        'name' => 'Mercury',
        'type' => 'Terrestrial Planet',
        'image' => 'https://images.unsplash.com/photo-1614728894747-a83421e2b9c9?q=80&w=1200&auto=format&fit=crop',
        'desc' => 'The smallest planet in our solar system and nearest to the Sun. It has a highly cratered surface, resembling Earth\'s Moon. Despite its proximity to the sun, Mercury is not the hottest planet; that title belongs to Venus. However, Mercury experiences extreme temperature fluctuations, ranging from 800°F (430°C) during the day to -290°F (-180°C) at night.',
        'moons' => [],
        'missions' => [
            ['name' => 'Mariner 10', 'desc' => 'The first spacecraft to visit Mercury, flying by three times in 1974 and 1975.', 'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'MESSENGER', 'desc' => 'Orbited Mercury from 2011 to 2015 to study its chemical composition, geology, and magnetic field.', 'image' => 'https://images.unsplash.com/photo-1541873676-a18131494184?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'BepiColombo', 'desc' => 'A joint mission by ESA and JAXA, currently en route to study Mercury\'s composition, geophysics, atmosphere, magnetosphere, and history.', 'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop']
        ],
        'rovers' => [
            ['name' => 'None', 'desc' => 'No rovers have been deployed to Mercury due to extreme thermal conditions.', 'image' => 'https://images.unsplash.com/photo-1541873676-a18131494184?q=80&w=600&auto=format&fit=crop']
        ]
    ],
    'venus' => [
        'name' => 'Venus',
        'type' => 'Terrestrial Planet',
        'image' => 'https://images.unsplash.com/photo-1614730321146-b6fa6a46bcb4?q=80&w=1200&auto=format&fit=crop',
        'desc' => 'Earth’s closest planetary neighbor. It has a thick, toxic atmosphere filled with carbon dioxide and it’s perpetually shrouded in thick, yellowish clouds of sulfuric acid that trap heat, causing a runaway greenhouse effect. It’s the hottest planet in our solar system, even though Mercury is closer to the Sun.',
        'moons' => [],
        'missions' => [
            ['name' => 'Mariner 2', 'desc' => 'The first successful mission to another planet, flying by Venus in 1962.', 'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Magellan', 'desc' => 'Mapped 98% of the surface of Venus using synthetic aperture radar.', 'image' => 'https://images.unsplash.com/photo-1541873676-a18131494184?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Akatsuki', 'desc' => 'A Japanese space probe orbiting Venus to study the atmosphere and meteorology.', 'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'DAVINCI+ (Upcoming)', 'desc' => 'Planned NASA mission to measure the composition of Venus\' atmosphere.', 'image' => 'https://images.unsplash.com/photo-1541873676-a18131494184?q=80&w=600&auto=format&fit=crop']
        ],
        'rovers' => [
            ['name' => 'Venera 13 Lander', 'desc' => 'Soviet lander that survived for 127 minutes on the surface, returning the first color images.', 'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Venera 14 Lander', 'desc' => 'Soviet lander that survived 57 minutes in the extreme heat.', 'image' => 'https://images.unsplash.com/photo-1541873676-a18131494184?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Vega 2 Balloon', 'desc' => 'A balloon probe deployed into the Venusian atmosphere by the Soviet Union.', 'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop']
        ]
    ],
    'earth' => [
        'name' => 'Earth',
        'type' => 'Terrestrial Planet',
        'image' => 'https://images.unsplash.com/photo-1614730321146-b6fa6a46bcb4?q=80&w=1200&auto=format&fit=crop',
        'desc' => 'Our home planet, the only place we know of so far that’s inhabited by living things. It\'s the only world in our solar system with liquid water on the surface.',
        'moons' => [
            ['name' => 'The Moon', 'desc' => 'Earth\'s only natural satellite, formed 4.5 billion years ago.', 'image' => 'https://images.unsplash.com/photo-1522030299830-16b8d3d049fe?q=80&w=600&auto=format&fit=crop']
        ],
        'missions' => [
            ['name' => 'Apollo Program', 'desc' => 'Put the first humans on the Moon.', 'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Hubble Space Telescope', 'desc' => 'Orbiting observatory that has transformed our understanding of the universe.', 'image' => 'https://images.unsplash.com/photo-1541873676-a18131494184?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'International Space Station', 'desc' => 'A modular space station in low Earth orbit.', 'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop']
        ],
        'rovers' => [
            ['name' => 'Lunar Roving Vehicle (LRV)', 'desc' => 'Used by Apollo 15, 16, and 17 astronauts.', 'image' => 'https://images.unsplash.com/photo-1541873676-a18131494184?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Yutu-2 (Chang\'e 4)', 'desc' => 'First rover on the far side of the Moon.', 'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Pragyan (Chandrayaan-3)', 'desc' => 'Indian lunar rover that explored the lunar south pole region.', 'image' => 'https://images.unsplash.com/photo-1541873676-a18131494184?q=80&w=600&auto=format&fit=crop']
        ]
    ],
    'mars' => [
        'name' => 'Mars',
        'type' => 'Terrestrial Planet',
        'image' => 'https://images.unsplash.com/photo-1614730321146-b6fa6a46bcb4?q=80&w=1200&auto=format&fit=crop',
        'desc' => 'The Red Planet, a dusty, cold, desert world with a very thin atmosphere. There is strong evidence Mars was—billions of years ago—wetter and warmer, with a thicker atmosphere. It is a dynamic planet with seasons, polar ice caps, canyons, and extinct volcanoes.',
        'moons' => [
            ['name' => 'Phobos', 'desc' => 'The larger and closer of the two moons.', 'image' => 'https://images.unsplash.com/photo-1522030299830-16b8d3d049fe?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Deimos', 'desc' => 'The smaller, outer moon of Mars.', 'image' => 'https://images.unsplash.com/photo-1522030299830-16b8d3d049fe?q=80&w=600&auto=format&fit=crop']
        ],
        'missions' => [
            ['name' => 'Mars Reconnaissance Orbiter', 'desc' => 'Searching for evidence of past water on Mars.', 'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'MAVEN', 'desc' => 'Studying the Martian upper atmosphere and ionosphere.', 'image' => 'https://images.unsplash.com/photo-1541873676-a18131494184?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Mars Express', 'desc' => 'ESA mission exploring Mars since 2003.', 'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Viking 1 & 2', 'desc' => 'First landers to successfully operate on the surface.', 'image' => 'https://images.unsplash.com/photo-1541873676-a18131494184?q=80&w=600&auto=format&fit=crop']
        ],
        'rovers' => [
            ['name' => 'Curiosity', 'desc' => 'Exploring Gale Crater, investigating Mars\' habitability.', 'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Perseverance', 'desc' => 'Searching for signs of ancient microbial life and collecting samples.', 'image' => 'https://images.unsplash.com/photo-1541873676-a18131494184?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Opportunity', 'desc' => 'Active from 2004 to 2018, confirming past water activity.', 'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Spirit', 'desc' => 'Twin to Opportunity, active from 2004 to 2010.', 'image' => 'https://images.unsplash.com/photo-1541873676-a18131494184?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Zhurong', 'desc' => 'Chinese rover that landed in Utopia Planitia.', 'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop']
        ]
    ],
    'jupiter' => [
        'name' => 'Jupiter',
        'type' => 'Gas Giant',
        'image' => 'https://images.unsplash.com/photo-1614732414444-096e5f1122d5?q=80&w=1200&auto=format&fit=crop',
        'desc' => 'The largest planet in our solar system, famous for its Great Red Spot and dozens of moons. Jupiter\'s familiar stripes and swirls are actually cold, windy clouds of ammonia and water, floating in an atmosphere of hydrogen and helium.',
        'moons' => [
            ['name' => 'Europa', 'desc' => 'Has a global ocean of water hidden beneath its icy crust.', 'image' => 'https://images.unsplash.com/photo-1522030299830-16b8d3d049fe?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Ganymede', 'desc' => 'The largest moon in our solar system, bigger than Mercury.', 'image' => 'https://images.unsplash.com/photo-1522030299830-16b8d3d049fe?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Io', 'desc' => 'The most volcanically active body in the solar system.', 'image' => 'https://images.unsplash.com/photo-1522030299830-16b8d3d049fe?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Callisto', 'desc' => 'The most heavily cratered object in the solar system.', 'image' => 'https://images.unsplash.com/photo-1522030299830-16b8d3d049fe?q=80&w=600&auto=format&fit=crop']
        ],
        'missions' => [
            ['name' => 'Pioneer 10 & 11', 'desc' => 'The first spacecraft to fly by Jupiter and its moons.', 'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Voyager 1 & 2', 'desc' => 'Provided incredible close-up images of Jupiter and its moons.', 'image' => 'https://images.unsplash.com/photo-1541873676-a18131494184?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Galileo', 'desc' => 'First spacecraft to orbit Jupiter.', 'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Juno', 'desc' => 'Currently studying Jupiter\'s composition, gravity field, and magnetic field.', 'image' => 'https://images.unsplash.com/photo-1541873676-a18131494184?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'JUICE', 'desc' => 'ESA mission to study Jupiter and its icy moons.', 'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop']
        ],
        'rovers' => [
            ['name' => 'Galileo Probe', 'desc' => 'An atmospheric probe plunged into Jupiter\'s atmosphere in 1995.', 'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop']
        ]
    ],
    'saturn' => [
        'name' => 'Saturn',
        'type' => 'Gas Giant',
        'image' => 'https://images.unsplash.com/photo-1614728894747-a83421e2b9c9?q=80&w=1200&auto=format&fit=crop',
        'desc' => 'Adorned with a dazzling, complex system of icy rings, Saturn is unique in our solar system. The other giant planets have rings, but none are as spectacular or as complicated as Saturn\'s. Like Jupiter, Saturn is a massive ball made mostly of hydrogen and helium.',
        'moons' => [
            ['name' => 'Titan', 'desc' => 'The second-largest moon, with a thick, Earth-like atmosphere and liquid methane lakes.', 'image' => 'https://images.unsplash.com/photo-1522030299830-16b8d3d049fe?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Enceladus', 'desc' => 'An icy moon with active geysers spewing water into space.', 'image' => 'https://images.unsplash.com/photo-1522030299830-16b8d3d049fe?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Mimas', 'desc' => 'The "Death Star" moon, known for its massive impact crater.', 'image' => 'https://images.unsplash.com/photo-1522030299830-16b8d3d049fe?q=80&w=600&auto=format&fit=crop']
        ],
        'missions' => [
            ['name' => 'Pioneer 11', 'desc' => 'The first flyby of Saturn in 1979.', 'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Voyager 1 & 2', 'desc' => 'Transmitted high-resolution images of Saturn and its rings.', 'image' => 'https://images.unsplash.com/photo-1541873676-a18131494184?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Cassini', 'desc' => 'Orbited Saturn for 13 years, discovering incredible details about the planet and its moons.', 'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Dragonfly (Upcoming)', 'desc' => 'A rotorcraft lander mission to Titan.', 'image' => 'https://images.unsplash.com/photo-1541873676-a18131494184?q=80&w=600&auto=format&fit=crop']
        ],
        'rovers' => [
            ['name' => 'Huygens Probe', 'desc' => 'ESA probe that successfully landed on Titan in 2005, the farthest landing from Earth.', 'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop']
        ]
    ],
    'uranus' => [
        'name' => 'Uranus',
        'type' => 'Ice Giant',
        'image' => 'https://images.unsplash.com/photo-1614732414444-096e5f1122d5?q=80&w=1200&auto=format&fit=crop',
        'desc' => 'Uranus is the seventh planet from the Sun, spinning on its side. It has the third-largest diameter in our solar system and is very cold and windy. It is surrounded by 13 faint rings and 27 small moons.',
        'moons' => [
            ['name' => 'Titania', 'desc' => 'The largest moon of Uranus, with massive canyons and faults.', 'image' => 'https://images.unsplash.com/photo-1522030299830-16b8d3d049fe?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Oberon', 'desc' => 'The outermost major moon, heavily cratered and ancient.', 'image' => 'https://images.unsplash.com/photo-1522030299830-16b8d3d049fe?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Miranda', 'desc' => 'A bizarre moon with a patchwork surface of ridges, valleys, and craters.', 'image' => 'https://images.unsplash.com/photo-1522030299830-16b8d3d049fe?q=80&w=600&auto=format&fit=crop']
        ],
        'missions' => [
            ['name' => 'Voyager 2', 'desc' => 'The only spacecraft to ever visit Uranus, flying by in 1986.', 'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Hubble Space Telescope', 'desc' => 'Regularly observes Uranus from Earth orbit, monitoring atmospheric changes.', 'image' => 'https://images.unsplash.com/photo-1541873676-a18131494184?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Uranus Orbiter and Probe (Proposed)', 'desc' => 'A proposed flagship mission to study the Uranian system.', 'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop']
        ],
        'rovers' => [
            ['name' => 'None', 'desc' => 'No probes or rovers have ever been sent to the surface of Uranus.', 'image' => 'https://images.unsplash.com/photo-1541873676-a18131494184?q=80&w=600&auto=format&fit=crop']
        ]
    ],
    'neptune' => [
        'name' => 'Neptune',
        'type' => 'Ice Giant',
        'image' => 'https://images.unsplash.com/photo-1614728894747-a83421e2b9c9?q=80&w=1200&auto=format&fit=crop',
        'desc' => 'Dark, cold, and whipped by supersonic winds, ice giant Neptune is the eighth and most distant planet. It is more than 30 times as far from the Sun as Earth. Neptune is the only planet in our solar system not visible to the naked eye.',
        'moons' => [
            ['name' => 'Triton', 'desc' => 'Neptune\'s largest moon, orbiting backwards relative to Neptune\'s rotation. It has geysers spewing icy material.', 'image' => 'https://images.unsplash.com/photo-1522030299830-16b8d3d049fe?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Proteus', 'desc' => 'The second-largest moon, highly irregular in shape.', 'image' => 'https://images.unsplash.com/photo-1522030299830-16b8d3d049fe?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Nereid', 'desc' => 'Has one of the most eccentric orbits of any moon in the solar system.', 'image' => 'https://images.unsplash.com/photo-1522030299830-16b8d3d049fe?q=80&w=600&auto=format&fit=crop']
        ],
        'missions' => [
            ['name' => 'Voyager 2', 'desc' => 'Flew by Neptune in 1989, providing the only close-up images of the planet and Triton.', 'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Hubble Space Telescope', 'desc' => 'Observes Neptune\'s atmospheric dynamics and storms from afar.', 'image' => 'https://images.unsplash.com/photo-1541873676-a18131494184?q=80&w=600&auto=format&fit=crop'],
            ['name' => 'Neptune Odyssey (Proposed)', 'desc' => 'A proposed mission to orbit Neptune and study its atmosphere, rings, and moons.', 'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop']
        ],
        'rovers' => [
            ['name' => 'None', 'desc' => 'No landers or rovers have explored Neptune or its moons yet.', 'image' => 'https://images.unsplash.com/photo-1541873676-a18131494184?q=80&w=600&auto=format&fit=crop']
        ]
    ]
];

$data = $planet_data[$planet_id] ?? $planet_data['mars'];
$page_title = $data['name'] . ' | Space Shutter';
require_once __DIR__ . '/../../layouts/header.php';
?>

<main class="relative min-h-screen bg-transparent">
    <!-- Hero Section -->
    <div class="relative h-[60vh] flex flex-col items-center justify-center overflow-hidden pt-20">
        <!-- CSS Rotating Planet -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] rounded-full opacity-30 blur-[2px] z-0" style="background: radial-gradient(circle, rgba(126,34,206,0.3) 0%, rgba(0,0,0,0) 70%);"></div>
        
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[400px] h-[400px] rounded-full overflow-hidden z-0 shadow-[0_0_100px_rgba(126,34,206,0.4)] animate-[spin_60s_linear_infinite]" style="box-shadow: inset -20px -20px 40px rgba(0,0,0,0.8), inset 10px 10px 20px rgba(255,255,255,0.2), 0 0 50px rgba(126,34,206,0.3);">
            <img src="<?= htmlspecialchars($data['image']) ?>" alt="<?= htmlspecialchars($data['name']) ?>" class="w-full h-full object-cover scale-110">
        </div>
        
        <div class="absolute inset-0 bg-gradient-to-t from-transparent via-black/20 to-transparent z-0 pointer-events-none"></div>
        
        <div class="relative z-10 text-center px-4 max-w-4xl mx-auto mt-auto mb-10">
            <div class="inline-block border border-brand-purple/50 bg-black/50 backdrop-blur-md text-brand-purple px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest shadow-[0_0_15px_rgba(126,34,206,0.3)] mb-4">
                <?= htmlspecialchars($data['type']) ?>
            </div>
            <h1 class="text-6xl md:text-8xl font-serif font-bold text-white uppercase tracking-widest drop-shadow-[0_0_20px_rgba(0,0,0,1)] mb-6">
                <?= htmlspecialchars($data['name']) ?>
            </h1>
            <p class="text-lg md:text-xl text-gray-200 font-light tracking-wide leading-relaxed drop-shadow-[0_2px_4px_rgba(0,0,0,0.8)] bg-black/40 backdrop-blur-sm p-6 rounded-2xl border border-white/10">
                <?= htmlspecialchars($data['desc']) ?>
            </p>
        </div>
    </div>

    <!-- Details Section -->
    <div class="max-w-7xl mx-auto px-8 pb-24 -mt-10 relative z-20">
        
        <div class="flex items-center mb-10 border-b border-white/10 pb-4">
            <a href="/space-shuter/planet" class="text-brand-purple hover:text-white transition-colors flex items-center gap-2 uppercase tracking-widest text-xs font-bold">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Destinations
            </a>
        </div>

        <?php if (!empty($data['moons'])): ?>
        <div class="mb-16">
            <h2 class="text-3xl font-serif font-bold text-white mb-8 border-l-4 border-brand-purple pl-4">Notable Moons</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($data['moons'] as $moon): ?>
                    <div class="bg-surface rounded-xl overflow-hidden border border-white/5 hover:border-white/20 transition-all group">
                        <div class="h-48 overflow-hidden bg-black flex items-center justify-center">
                            <img src="<?= htmlspecialchars($moon['image']) ?>" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 group-hover:scale-110 transition-all duration-500">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-serif font-bold text-white mb-2"><?= htmlspecialchars($moon['name']) ?></h3>
                            <p class="text-gray-400 text-sm font-light"><?= htmlspecialchars($moon['desc']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

        <?php if (!empty($data['missions'])): ?>
        <div>
            <h2 class="text-3xl font-serif font-bold text-white mb-8 border-l-4 border-brand-gold pl-4">Missions & Rovers</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($data['missions'] as $mission): ?>
                    <div class="bg-surface rounded-xl overflow-hidden border border-white/5 hover:border-brand-gold/30 transition-all group">
                        <div class="h-48 overflow-hidden relative">
                            <img src="<?= htmlspecialchars($mission['image']) ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-80"></div>
                            <div class="absolute bottom-4 left-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-brand-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                <span class="text-white font-bold tracking-widest text-sm uppercase"><?= htmlspecialchars($mission['name']) ?></span>
                            </div>
                        </div>
                        <div class="p-6">
                            <p class="text-gray-400 text-sm font-light"><?= htmlspecialchars($mission['desc']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
        
    </div>
</main>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
