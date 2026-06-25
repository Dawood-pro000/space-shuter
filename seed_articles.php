<?php
require_once __DIR__ . '/config/env_loader.php';
require_once __DIR__ . '/services/DatabaseService.php';

try {
    $db = DatabaseService::getConnection();

    $titles = [
        "The Mysteries of the Andromeda Galaxy", "JWST Discovers New Exoplanet", "Mars Rover Finds Ancient Riverbed",
        "The Event Horizon Telescope's Latest Black Hole", "Understanding Dark Matter", "The Artemis Mission: Back to the Moon",
        "Venus's Atmospheric Anomalies", "Saturn's Rings are Disappearing", "The Voyager Probes' Journey into Interstellar Space",
        "SpaceX's Starship Development", "The Search for Extraterrestrial Intelligence (SETI)", "Jupiter's Great Red Spot is Shrinking",
        "The Hubble Space Telescope's Legacy", "Europa Clipper: Mission to Jupiter's Icy Moon", "Asteroid Mining: The Future of Resource Extraction",
        "The Threat of Space Debris", "How Solar Flares Affect Earth", "The Evolution of Spacesuits",
        "Telescopes of the Future", "The Physics of Wormholes", "Is Time Travel Possible?",
        "The Fermi Paradox Explained", "The Big Bang Theory: New Evidence", "Cosmic Microwave Background Radiation",
        "The Role of AI in Space Exploration", "Astrobiology: Life in the Universe", "The Geology of Mars",
        "The Ocean Worlds of our Solar System", "The Future of Interstellar Travel", "The Psychology of Long-Duration Spaceflight"
    ];

    $abstract = "This article dives deep into the recent discoveries and scientific analyses surrounding this fascinating topic. Utilizing data from multiple space agencies and advanced telemetry.";
    $content = "<p>Here is the detailed content for this aerospace topic. Further research and observation are required to fully understand the implications.</p>";
    
    $count = 0;
    foreach ($titles as $index => $title) {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title), '-'));
        
        // Pexels/Unsplash placeholder images for Space
        // Use a generic placeholder that loads a random space image for variety
        $image_url = "https://source.unsplash.com/800x600/?space,galaxy,astronomy,sig=" . $index;
        
        $interval = "$index days";
        $stmt = $db->prepare("INSERT INTO posts (title, slug, abstract, content, image_url, status, publish_date) VALUES (?, ?, ?, ?, ?, 'published', NOW() - CAST(? AS INTERVAL)) ON CONFLICT (slug) DO NOTHING");
        $stmt->execute([$title, $slug, $abstract, $content, $image_url, $interval]);
        $count++;
    }

    echo "Successfully seeded $count articles with images.\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
