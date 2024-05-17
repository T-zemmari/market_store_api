<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PersonalAccessTokenController;
use App\Http\Controllers\ProductController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers'], function () {
    Route::apiResource('customers', CustomerController::class)->middleware('auth:sanctum');
    Route::apiResource('categories', CategoryController::class)->middleware('auth:sanctum');
    Route::apiResource('products', ProductController::class)->middleware('auth:sanctum');
    Route::apiResource('images', ImageController::class)->middleware('auth:sanctum');
    Route::apiResource('orders', OrderController::class)->middleware('auth:sanctum');
    Route::post('images/bulk', [ImageController::class, 'bulkStore'])->middleware('auth:sanctum');
    Route::post('get_token', function (Request $request) {

        // Si el usuario no está autenticado, intentar autenticarlo
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
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
            return response()->json(['token' => $token]);
        } else {
            // Si las credenciales son inválidas, registrar al usuario
            $request->validate([
                'email' => ['required', 'email', 'unique:users,email'],
                'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'],
                'password_confirmation' => ['required', 'same:password'],
                'register_admin_code' => ['nullable', 'string'],
            ]);
            $roles = ['ROLE_USER'];
            $user_type = 'user';
            if ($request->register_admin_code == 'Ta00') {
                $roles = ['ROLE_SUPERADMIN', 'ROLE_ADMIN', 'ROLE_USER'];
                $user_type = 'admin';
            }
            $name =  Str::random(10);
            $user = User::create([
                'name' => $name,
                'active' => 'active',
                'user_type' => $user_type,
                'roles' => json_encode($roles),
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);


            $user->tokens()->delete();

            $tokens = [
                'customers' => $user->user_type === 'admin' ? ['read', 'create', 'update', 'delete'] : ['read', 'create'],
                'categories' => $user->user_type === 'admin' ? ['read', 'create', 'update', 'delete'] : ['read', 'create'],
                'products' => $user->user_type === 'admin' ? ['read', 'create', 'update', 'delete'] : ['read', 'create'],
                'images' => $user->user_type === 'admin' ? ['read', 'create', 'update', 'delete'] : ['read', 'create'],
                'orders' => $user->user_type === 'admin' ? ['read', 'create', 'update', 'delete'] : ['read', 'create'],
            ];
            $token = $user->createToken($user->user_type === 'admin' ? 'admin_token' : 'user_token', $tokens)->plainTextToken;
            return response()->json(['token' => $token]);
        }
    });
});
