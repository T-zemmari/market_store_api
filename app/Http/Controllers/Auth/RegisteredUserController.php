<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'register_admin_code' => ['nullable', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        $user_type = 'user';
        $roles = json_encode(['ROLE_USER']);
        if ($request->register_admin_code == 'Ta00') {
            $user_type = 'admin';
            $roles = json_encode(['ROLE_SUPERADMIN,ROLE_ADMIN,ROLE_USER']);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'user_type' => $user_type,
            'roles' => $roles,
            'active' =>'active',
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        //Auth::login($user);

        //return redirect(RouteServiceProvider::HOME);
        return redirect()->route('login');
    }
}
