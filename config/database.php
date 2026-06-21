<?php
// config/database.php
// Project Vision - Supabase PostgreSQL Connection Config

define('DB_HOST', getenv('SUPABASE_DB_HOST') ?: 'aws-0-us-east-1.pooler.supabase.com'); // Replace with your actual pooler host if different
define('DB_PORT', getenv('SUPABASE_DB_PORT') ?: '5432');
define('DB_NAME', getenv('SUPABASE_DB_NAME') ?: 'postgres');
define('DB_USER', getenv('SUPABASE_DB_USER') ?: 'postgres.your_project_id');
define('DB_PASS', getenv('SUPABASE_DB_PASSWORD'));

class Database {
    private static $instance = null;
    private $conn;

    private function __construct() {
        $dsn = "pgsql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME;
        try {
            $this->conn = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
        } catch (PDOException $e) {
            // Secure error boundary to prevent credential leaks
            error_log("Database connection failure: " . $e->getMessage());
            die(json_encode(["error" => "Secure database connectivity interface failed."]));
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance->conn;
    }
}
