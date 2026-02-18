<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Order\OrderController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\API\Cart\CartController;

Route::post('/orders', [OrderController::class, 'store']);

Route::post('/cart/add', [CartController::class, 'store']);
Route::post('/cart/update', [CartController::class, 'update']);

//Route::post('/cart/remove', [CartController::class, 'destroy']);
//Route::get('/cart', [CartController::class, 'get']);













    