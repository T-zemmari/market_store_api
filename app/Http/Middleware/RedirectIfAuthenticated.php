<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();
                $user->tokens()->delete();
                $tokens = [
                    'customers' => $user->user_type === 'admin' ? ['read', 'create', 'update', 'delete'] : ['read', 'create'],
                    'categories' => $user->user_type === 'admin' ? ['read', 'create', 'update', 'delete'] : ['read', 'create'],
                    'products' => $user->user_type === 'admin' ? ['read', 'create', 'update', 'delete'] : ['read', 'create'],
                    'images' => $user->user_type === 'admin' ? ['read', 'create', 'update', 'delete'] : ['read', 'create'],
                    'orders' => $user->user_type === 'admin' ? ['read', 'create', 'update', 'delete'] : ['read', 'create'],
                ];
                $token = $request->user()->createToken($request->user()->user_type === 'admin' ? 'admin_token' : 'user_token', $tokens)->plainTextToken;
                Session::put('mis_tokens', $token);
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
