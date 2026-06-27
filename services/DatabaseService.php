<?php
// services/DatabaseService.php

class DatabaseService {
    private static $instance = null;
    private $conn;

    private function __construct() {
        // Load connection settings from environment
        $db_host = $_ENV['SUPABASE_DB_HOST'] ?? getenv('SUPABASE_DB_HOST') ?: 'aws-0-us-east-1.pooler.supabase.com';
        // Supabase Transaction Mode pooler uses port 6543; Session Mode uses 5432
        $db_port = $_ENV['SUPABASE_DB_PORT'] ?? getenv('SUPABASE_DB_PORT') ?: '6543';
        $db_name = $_ENV['SUPABASE_DB_NAME'] ?? getenv('SUPABASE_DB_NAME') ?: 'postgres';
        $db_pass = $_ENV['SUPABASE_DB_PASSWORD'] ?? getenv('SUPABASE_DB_PASSWORD');

        // Supabase pooler REQUIRES username = "postgres.{project-ref}" for tenant routing.
        // We auto-derive the project-ref from SUPABASE_URL if the user var is just "postgres".
        $db_user = $_ENV['SUPABASE_DB_USER'] ?? getenv('SUPABASE_DB_USER');
        if (!$db_user || $db_user === 'postgres') {
            $supabase_url = $_ENV['SUPABASE_URL'] ?? getenv('SUPABASE_URL') ?: '';
            // Extract project ref: "https://{ref}.supabase.co"
            if (preg_match('#https://([a-z0-9]+)\.supabase\.co#', $supabase_url, $m)) {
                $db_user = 'postgres.' . $m[1];
            } else {
                $db_user = 'postgres'; // fallback (direct connection only)
            }
        }

        if (!$db_user || !$db_pass) {
            die('Database credentials missing from environment. Please set SUPABASE_DB_USER and SUPABASE_DB_PASSWORD.');
        }

        $dsn = "pgsql:host=$db_host;port=$db_port;dbname=$db_name";

        try {
            $this->conn = new PDO(
                $dsn,
                $db_user,
                $db_pass,
                [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ]
            );
        } catch (PDOException $e) {
            die('Secure database connectivity interface failed. Details: ' . $e->getMessage());
        }
    }

    public static function getConnection() {
        if (!self::$instance) {
            self::$instance = new DatabaseService();
        }
        return self::$instance->conn;
    }
}
