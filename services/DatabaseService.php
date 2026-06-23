<?php
// services/DatabaseService.php

class DatabaseService {
    private static $instance = null;
    private $conn;

    private function __construct() {
        $db_host = getenv('SUPABASE_DB_HOST') ?: 'aws-0-us-east-1.pooler.supabase.com';
        $db_port = getenv('SUPABASE_DB_PORT') ?: '5432';
        $db_name = getenv('SUPABASE_DB_NAME') ?: 'postgres';
        
        $db_user = getenv('SUPABASE_DB_USER');
        if (!$db_user) {
            $url = getenv('SUPABASE_URL');
            if ($url && preg_match('/https:\/\/([^.]+)\.supabase\.co/', $url, $matches)) {
                $db_user = 'postgres.' . $matches[1];
            }
        }
        
        $db_pass = getenv('SUPABASE_DB_PASSWORD');

        if (!$db_user || !$db_pass) {
            die("Database credentials missing from environment. Please set SUPABASE_DB_PASSWORD.");
        }

        $dsn = "pgsql:host=$db_host;port=$db_port;dbname=$db_name";
        try {
            $this->conn = new PDO($dsn, $db_user, $db_pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
        } catch (PDOException $e) {
            error_log("Database connection failure: " . $e->getMessage());
            die("Secure database connectivity interface failed.");
        }
    }

    public static function getConnection() {
        if (!self::$instance) {
            self::$instance = new DatabaseService();
        }
        return self::$instance->conn;
    }
}
