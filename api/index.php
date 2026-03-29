<?php

/**
 * Forward all requests to the public/index.php file.
 * This is the entry point for Vercel functions.
 */

// TEMPORARY: Enable error reporting for debugging 500 error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_SERVER['VERCEL_URL']) || isset($_ENV['VERCEL_URL'])) {
    $storagePath = '/tmp/storage';
    putenv("LARAVEL_STORAGE_PATH=$storagePath");
    $_ENV['LARAVEL_STORAGE_PATH'] = $storagePath;
    $_SERVER['LARAVEL_STORAGE_PATH'] = $storagePath;

    $cachePath = $storagePath . '/bootstrap/cache/';
    $vars = [
        'APP_CONFIG_CACHE' => $cachePath . 'config.php',
        'APP_ROUTES_CACHE' => $cachePath . 'routes.php',
        'APP_SERVICES_CACHE' => $cachePath . 'services.php',
        'APP_PACKAGES_CACHE' => $cachePath . 'packages.php',
        'LOG_CHANNEL' => 'stderr',
    ];

    foreach ($vars as $key => $value) {
        putenv("$key=$value");
        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
    }

    $storage = [
        $storagePath . '/framework/cache/data',
        $storagePath . '/framework/sessions',
        $storagePath . '/framework/views',
        $storagePath . '/logs',
        $storagePath . '/bootstrap/cache'
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
