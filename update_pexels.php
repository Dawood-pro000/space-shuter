<?php
require_once __DIR__ . '/services/PexelsService.php';
require_once __DIR__ . '/services/DatabaseService.php';

$pexels = new PexelsService();
$db = DatabaseService::getConnection();

echo "Fetching specific images from Pexels API...\n";

$stmt = $db->query("SELECT id, title FROM posts WHERE status = 'published' ORDER BY created_at DESC LIMIT 30");
$posts = $stmt->fetchAll();

$count = 0;
foreach ($posts as $post) {
    // Generate a simple query from the title
    $query_words = explode(' ', $post['title']);
    $query = implode(' ', array_slice($query_words, 0, 3)); // Use first 3 words of title
    // Add "space" to ensure it stays somewhat relevant to space if the title is generic
    $query = $query . " space galaxy";
    
    // Fetch 1 image for this specific query
    $data = $pexels->searchSpaceImages($query, 1);
    
    if ($data && isset($data['photos'][0])) {
        $img_url = $data['photos'][0]['src']['large'];
        
        $update = $db->prepare("UPDATE posts SET image_url = ? WHERE id = ?");
        $update->execute([$img_url, $post['id']]);
        $count++;
        echo "Updated '{$post['title']}' with matched image.\n";
    } else {
        echo "No specific image found for '{$post['title']}', skipping.\n";
    }
    
    // Sleep slightly to avoid rapid rate-limiting
    usleep(500000); // 0.5 seconds
}

echo "\nSuccess! Replaced dummy images with $count MATCHING high-res images from Pexels.\n";
