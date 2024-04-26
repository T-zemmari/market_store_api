<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalAccessTokenController extends Controller
{
    /**
     * Store a newly created personal access token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if ($user->user_type !== 'admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // El usuario tiene permisos de administrador, continuar con la creación del token
        $token = $this->createToken($user, $request->token_name, $request->scopes ?? []);


        return response()->json(['token' => $token->plainTextToken]);
    }
}
