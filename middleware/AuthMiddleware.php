<?php
// middleware/AuthMiddleware.php
class AuthMiddleware {
    public static function check() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /space-shuter/login');
            exit;
        }
    }
}
