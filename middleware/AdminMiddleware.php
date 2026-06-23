<?php
// middleware/AdminMiddleware.php
class AdminMiddleware {
    public static function check() {
        if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
            http_response_code(403);
            die("403 - Forbidden: Admin access required.");
        }
    }
}
