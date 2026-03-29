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
        '/tmp/storage/logs'
    ];
    foreach ($storage as $path) {
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }
    }
}

// Trace echos
// echo "API Entry point reached.<br>";
if (file_exists(__DIR__ . '/../public/index.php')) {
    // echo "Found public/index.php.<br>";
} else {
    die("ERROR: public/index.php NOT FOUND at " . realpath(__DIR__ . '/../public/index.php'));
}

require __DIR__ . '/../public/index.php';
