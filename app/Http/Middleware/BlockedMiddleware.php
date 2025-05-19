<?php

namespace App\Http\Middleware;

use App\Models\Blocked_user;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlockedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (auth()->check()) {
            $blocked = Blocked_user::where('user_id', auth()->id())->first();
            if ($blocked) {
                if (empty($blocked->unblocked_at) && $blocked->is_blocked == 1) {
                    abort(403, 'Sua conta está bloqueada. Contate o suporte.');
                }
            }
        }
        return $next($request);
    }
}
