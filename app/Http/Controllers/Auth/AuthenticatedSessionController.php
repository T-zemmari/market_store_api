<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();
        //return redirect()->intended(RouteServiceProvider::HOME)->with('token', $token);
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
        return redirect()->route('profile.edit')->with(['token' => $token]);
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
