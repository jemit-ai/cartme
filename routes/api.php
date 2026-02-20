<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Order\OrderController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\API\Cart\CartController;
use App\Http\Controllers\API\User\RegisterController;



Route::group(['middleware' => 'territory'], function () {

    Route::post('/register', [RegisterController::class, 'register']);

    Route::post('/orders', [OrderController::class, 'store']);
    Route::post('/cart/add', [CartController::class, 'store']);
    Route::post('/cart/update', [CartController::class, 'update']);

});













    