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
