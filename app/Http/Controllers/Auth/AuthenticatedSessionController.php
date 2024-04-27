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
    
        // Alcance por defecto para usuario regular
    $tokenName = 'user_token';
    $tokenScopes = ['read']; // Usuario regular solo puede leer

    // Verificar si el usuario es un administrador
    if ($request->user()->user_type === 'admin') {
        $tokenName = 'admin_token';
        // Administrador puede crear, leer, actualizar y eliminar
        $tokenScopes = ['create', 'read', 'update', 'delete'];
    }

    // Crear el token con el nombre y alcances apropiados
    $token = $request->user()->createToken($tokenName, $tokenScopes)->plainTextToken;
    
    //return redirect()->intended(RouteServiceProvider::HOME)->with('token', $token);
    return redirect()->route('profile.edit')->with('token', $token);
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
