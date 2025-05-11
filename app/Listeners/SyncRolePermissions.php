<?php

namespace App\Listeners;

use App\Events\RoleAssigned;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SyncRolePermissions
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RoleAssigned $event): void
    {
        $event->user->syncRolePermissions();
    }
}
