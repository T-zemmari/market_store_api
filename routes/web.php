<?php

use App\Http\Controllers\PersonalAccessTokenController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/csrf-token', function () {
    return Response()->json(['token' => csrf_token()]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Define las rutas para la creación de tokens
// Route::post('/admin-token', [PersonalAccessTokenController::class, 'store'])
//     ->middleware('auth:sanctum')
//     ->name('admin.token.create');

// Route::post('/read-token', [PersonalAccessTokenController::class, 'store'])
//     ->middleware(['auth:sanctum', 'scope:read'])
//     ->name('read.token.create');

// Route::post('/update-token', [PersonalAccessTokenController::class, 'store'])
//     ->middleware(['auth:sanctum', 'scope:update'])
//     ->name('update.token.create');


require __DIR__ . '/auth.php';
