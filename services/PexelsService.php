<?php
// services/PexelsService.php
require_once __DIR__ . '/../config/env_loader.php';

class PexelsService {
    private $api_key;

    public function __construct() {
        $this->api_key = $_ENV['PEXELS_API_KEY'] ?? '';
    }

    public function searchSpaceImages($query = 'outer space', $per_page = 30) {
        $url = "https://api.pexels.com/v1/search?query=" . urlencode($query) . "&per_page=" . $per_page;
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: " . $this->api_key
        ]);
        
        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpcode == 200) {
            return json_decode($response, true);
        }
        
        return null;
    }
}
