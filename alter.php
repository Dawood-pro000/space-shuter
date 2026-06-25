<?php
require_once __DIR__ . '/config/env_loader.php';
require_once __DIR__ . '/services/DatabaseService.php';

try {
    $db = DatabaseService::getConnection();
    $db->exec("ALTER TABLE public.users ADD COLUMN IF NOT EXISTS username VARCHAR(255)");
    echo "Successfully added username column.";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
