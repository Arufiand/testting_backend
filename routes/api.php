<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Non Token Group API
Route::post('/register', [authController::class, 'register']);
Route::post('/login', [authController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/logout', [authController::class, 'logout']);
    Route::get('/product', [Product::class, 'index']);
    Route::get('/productCategory', [Product::class, 'product_grouped_category']);
    Route::get('/detailProduct', [Product::class, 'product_detailed']);
});