<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\LocalizationMiddleware;
use App\Http\Middleware\LoginMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            LocalizationMiddleware::class,
        ]);
        $middleware->alias([
            'is_admin'=>AdminMiddleware::class,
            'is_logged_in'=> LoginMiddleware::class,
            'is_guest'=> GuestMiddleware::class,
        ]);

    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
