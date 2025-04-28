<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

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

        // Pega a primeira role do usuário
        $roleName = $user->roles->pluck('name')->first();

        if ($roleName) {
            // Busca a role no banco
            $role = Role::where('name', $roleName)->first();

            // Define para onde redirecionar
            $redirectTo = $role && $role->route ? route($role->route) : '/';
        } else {
            // Se o user não tiver role atribuída
            $redirectTo = '/';
        }
        // Coloca na sessão para o middleware/redirecionamento
        //Session::put('redirect_after_login', $redirectTo);

        // Se quiser já redirecionar aqui (não recomendado direto no event listener)
         Redirect::to($redirectTo);
    }
}
