<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Order\OrderController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Cart\CartController;




Route::post('/orders', [OrderController::class, 'store']);

route::post('/cart/add', [CartController::class, 'store']);
route::post('/cart/update', [CartController::class, 'update']);
route::post('/cart/remove', [CartController::class, 'destroy']);
route::get('/cart', [CartController::class, 'get']);











    