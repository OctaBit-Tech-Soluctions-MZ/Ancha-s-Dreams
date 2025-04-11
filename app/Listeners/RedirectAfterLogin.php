<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RedirectAfterLogin
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
    public function handle(Login $event): void
    {
        $user = $event->user;
        $role = DB::table('roles')
        ->where('role_key', $user->role)
        ->first();

        // redirecionar o user para a sua respectiva rota (rota default "/")
        $redirectTo = $role->route;

        redirect(Session::put('redirect_after_login', route($redirectTo)));
    }
}
