<?php

// Canonical redirects for legacy URLs and protocols
$host = $_SERVER['HTTP_HOST'] ?? '';
$uri = $_SERVER['REQUEST_URI'] ?? '/';
$queryString = isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] !== '' ? ('?' . $_SERVER['QUERY_STRING']) : '';

// Detect HTTPS behind proxies as well
$isHttps = (
    (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)
    || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https')
);

$canonicalHost = 'vienhancestudio.com';

// Allow local development
$isLocalDevelopment = in_array($host, ['localhost', '127.0.0.1', '127.0.0.1:8001', 'localhost:8001' , 'localhost:8000' , '127.0.0.1:8000']);

// Strip leading /index.php from the path
if (strpos($uri, '/index.php') === 0) {
    $uri = substr($uri, strlen('/index.php'));
    if ($uri === '') {
        $uri = '/';
    }
}

$needsHostFix = ($host !== $canonicalHost && !$isLocalDevelopment);
$needsSchemeFix = !$isHttps && !$isLocalDevelopment;
$needsPathFix = false; // already normalized above

if ($needsHostFix || $needsSchemeFix || $needsPathFix) {
    $location = 'https://' . $canonicalHost . $uri . $queryString;
    header('Location: ' . $location, true, 301);
    exit();
}

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());
