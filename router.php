<?php
/**
 * Router script for PHP built-in web server
 */

$uri = decodeURIComponent(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// If the file exists in public/ or at root, serve it directly
if ($uri !== '/' && (file_exists(__DIR__ . '/public' . $uri) || file_exists(__DIR__ . $uri))) {
    return false;
}

// Otherwise, route everything to public/index.php
require_once __DIR__ . '/public/index.php';

function decodeURIComponent($str) {
    return rawurldecode($str);
}
