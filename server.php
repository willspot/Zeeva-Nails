<?php
// server.php for PHP built-in server to handle Laravel routing

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// Serve existing files directly
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

// Otherwise forward request to Laravel's front controller
require_once __DIR__.'/public/index.php';
