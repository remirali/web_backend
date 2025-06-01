<?php
require_once __DIR__ . '/../scripts/db.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$_SESSION = [];

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

session_destroy();
// Перенаправление на главную
header('Location: /rarime.github.web/project/');
exit;