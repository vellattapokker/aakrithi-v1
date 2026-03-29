<?php

/**
 * Forward all requests to the public/index.php file.
 * This is the entry point for Vercel functions.
 */

// TEMPORARY: Enable error reporting for debugging 500 error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_SERVER['VERCEL_URL'])) {
    $storage = [
        '/tmp/storage/framework/cache',
        '/tmp/storage/framework/sessions',
        '/tmp/storage/framework/views',
        '/tmp/storage/logs',
        '/tmp/storage/bootstrap/cache'
    ];
    foreach ($storage as $path) {
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }
    }

    // Redirect bootstrap/cache files to /tmp
    putenv('APP_CONFIG_CACHE=/tmp/storage/bootstrap/cache/config.php');
    putenv('APP_ROUTES_CACHE=/tmp/storage/bootstrap/cache/routes.php');
    putenv('APP_SERVICES_CACHE=/tmp/storage/bootstrap/cache/services.php');
    putenv('APP_PACKAGES_CACHE=/tmp/storage/bootstrap/cache/packages.php');
    
    // Force logging to stderr for Vercel
    putenv('LOG_CHANNEL=stderr');
}

try {
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    echo "<h1>FATAL ERROR CAUGHT IN API ENTRY POINT</h1>";
    echo "<b>Error:</b> " . $e->getMessage() . "<br>";
    echo "<b>File:</b> " . $e->getFile() . "<br>";
    echo "<b>Line:</b> " . $e->getLine() . "<br>";
    echo "<b>Trace:</b><pre>" . $e->getTraceAsString() . "</pre>";
    error_log($e);
    die();
}
