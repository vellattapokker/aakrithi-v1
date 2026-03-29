<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->registered(function ($app) {
        if (isset($_SERVER['VERCEL_URL'])) {
            $app->useStoragePath('/tmp/storage');
            $app->useBootstrapPath('/tmp/storage/bootstrap');
            
            // Re-register the package manifest to use the new writable path
            $app->singleton(\Illuminate\Foundation\PackageManifest::class, function () use ($app) {
                return new \Illuminate\Foundation\PackageManifest(
                    new \Illuminate\Filesystem\Filesystem, 
                    $app->basePath(), 
                    $app->getCachedPackagesPath()
                );
            });

            // Force logging to stderr for Vercel
            config([
                'logging.default' => 'stderr',
                'view.compiled' => '/tmp/storage/framework/views',
                'cache.stores.file.path' => '/tmp/storage/framework/cache/data',
                'session.files' => '/tmp/storage/framework/sessions',
            ]);
        }
    })
    ->create();
