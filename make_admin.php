<?php
require_once __DIR__ . '/config/env_loader.php';
require_once __DIR__ . '/services/DatabaseService.php';

try {
    $db = DatabaseService::getConnection();
    // Update role
    $stmt = $db->prepare("UPDATE public.users SET role = 'admin' WHERE email = ?");
    $stmt->execute(['dawoodhashmi2006@gmail.com']);
    
    // Check if updated
    if ($stmt->rowCount() > 0) {
        echo "Successfully made dawoodhashmi2006@gmail.com an admin.\n";
    } else {
        // User might not exist yet. Let's insert a dummy one for now, but usually they'll sign up.
        echo "User dawoodhashmi2006@gmail.com not found. They might need to register first.\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
