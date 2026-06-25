<?php
require 'config/env_loader.php';
require 'services/DatabaseService.php';

try {
    $db = DatabaseService::getConnection();
    echo "SUCCESS: Database connection is working perfectly!";
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
}
