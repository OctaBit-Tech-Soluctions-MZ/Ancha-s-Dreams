<?php

namespace App\Http\Middleware;

<<<<<<< HEAD
=======
use App\Models\Role;
>>>>>>> 9fabbde (Primeiro commit)
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }
<<<<<<< HEAD
        return redirect('/');
=======
        $role = Role::where('role_key',Auth::user()->role)->first();
        return redirect(route($role->route));
>>>>>>> 9fabbde (Primeiro commit)
    }
}
