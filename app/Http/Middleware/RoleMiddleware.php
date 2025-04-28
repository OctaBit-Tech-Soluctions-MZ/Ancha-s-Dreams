<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if ($user->hasAnyRole($roles)) {
            return $next($request);
        }

        // Se não tiver permissão, pega a primeira role do usuário
        $userRoleName = $user->roles->pluck('name')->first();
        
        if ($userRoleName) {
            $role = Role::where('name', $userRoleName)->first();

            if ($role && $role->route) {
                // Se existe rota personalizada, redireciona
                return redirect(route($role->route));
            }
        }

        // Se não tiver role ou rota definida, redireciona para home
        return redirect('/');
}
}
