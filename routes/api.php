<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PersonalAccessTokenController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'v1', Controller::class], function () {
    Route::apiResource('customers', CustomerController::class)->middleware('auth:sanctum');
    Route::apiResource('categories', CategoryController::class)->middleware('auth:sanctum');
    Route::apiResource('products', ProductController::class)->middleware('auth:sanctum');
    Route::apiResource('orders', OrderController::class)->middleware('auth:sanctum');
});
