<?php
require_once __DIR__ . '/services/PexelsService.php';
require_once __DIR__ . '/services/DatabaseService.php';

$pexels = new PexelsService();
$db = DatabaseService::getConnection();

echo "Fetching images from Pexels API...\n";
// Let's get 30 premium space images
$data = $pexels->searchSpaceImages('galaxy outer space planets nebula', 30);

if ($data && isset($data['photos']) && count($data['photos']) > 0) {
    $photos = $data['photos'];
    
    // Get the posts we seeded earlier
    $stmt = $db->query("SELECT id FROM posts ORDER BY created_at DESC LIMIT 30");
    $posts = $stmt->fetchAll();
    
    $count = 0;
    foreach ($posts as $index => $post) {
        if (isset($photos[$index])) {
            // Using the 'large' landscape image format from Pexels
            $img_url = $photos[$index]['src']['large'];
            
            $update = $db->prepare("UPDATE posts SET image_url = ? WHERE id = ?");
            $update->execute([$img_url, $post['id']]);
            $count++;
        }
    }
    
    echo "Success! Replaced dummy images with $count REAL high-res images from Pexels.\n";
} else {
    echo "Failed to fetch from Pexels API. Please verify the API key is active.\n";
}
