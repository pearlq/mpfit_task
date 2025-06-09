<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\ProductController::class, 'getProductPage']);

Route::prefix('/product')->group(function () {
    Route::post('/add', [\App\Http\Controllers\ProductController::class, 'addProduct']);

    Route::get('/edit', [\App\Http\Controllers\ProductController::class, 'getEditProductPage']);
    Route::patch('/edit', [\App\Http\Controllers\ProductController::class, 'editProduct']);

    Route::get('/info', [\App\Http\Controllers\ProductController::class, 'getInfoProductPage']);

    Route::delete('/delete', [\App\Http\Controllers\ProductController::class, 'deleteProduct']);
});

Route::prefix('/order')->group(function () {
    Route::get('/', [\App\Http\Controllers\OrderController::class, 'getOrderPage']);
    Route::get('/add', [\App\Http\Controllers\OrderController::class, 'getAddToOrderPage']);
    Route::post('/add', [\App\Http\Controllers\OrderController::class, 'addToOrder']);
    Route::patch('/change/status/', [\App\Http\Controllers\OrderController::class, 'changeStatus']);
    Route::get('/info', [\App\Http\Controllers\OrderController::class, 'getInfoOrderPage']);
});

