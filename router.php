<?php
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
if ($uri !== '/') {
    if (file_exists(__DIR__ . '/public' . $uri)) {
        return false;
    }
    if (strpos($uri, '/assets/') === 0 && file_exists(__DIR__ . $uri)) {
        return false;
    }
}
$_SERVER['SCRIPT_NAME'] = '/index.php';
require_once __DIR__ . '/public/index.php';
