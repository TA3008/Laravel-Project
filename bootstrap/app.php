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
        $middleware->alias([
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
        'editor' => \App\Http\Middleware\EditorMiddleware::class,
        'viewer' => \App\Http\Middleware\ViewerMiddleware::class,
        'editorOrAdmin' => \App\Http\Middleware\EditorOrAdminMiddleware::class,
    ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
