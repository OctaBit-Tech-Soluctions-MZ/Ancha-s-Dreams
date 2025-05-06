<?php

namespace App\Providers;

use App\Events\RoleAssigned;
use App\Listeners\SyncRolePermissions;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        RoleAssigned::class => [
            SyncRolePermissions::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        parent::boot();
    }
}
