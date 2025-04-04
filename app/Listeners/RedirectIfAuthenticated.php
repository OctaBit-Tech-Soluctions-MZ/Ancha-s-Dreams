<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class RedirectIfAuthenticated
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
    public function handle(object $event): void
    {
        $user = $event->user;
        $role = DB::table('roles')
        ->where('id', $user->role_id)
        ->first();

        // redirecionar o user para a sua respectiva rota (rota default "/")
        $redirectTo = $role->route;

        redirect($redirectTo);
    }
}
