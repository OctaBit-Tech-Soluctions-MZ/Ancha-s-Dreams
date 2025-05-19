<?php

use App\Http\Middleware\BlockedMiddleware;
use App\Http\Middleware\EnsureCoursePurchased;
use App\Http\Middleware\EnsureUserIsAuth;
use App\Http\Middleware\LastUserActivity;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Spatie\Permission\Middleware\RoleMiddleware as MiddlewareRoleMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
                'role' => RoleMiddleware::class,
                'role_spatie' => MiddlewareRoleMiddleware::class,
                'last_user_activity' => LastUserActivity::class,
                'blocked' => BlockedMiddleware::class,
                'purchased.course' => EnsureCoursePurchased::class,
                'is_auth' => EnsureUserIsAuth::class,
            ]
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
