<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Order\OrderController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\API\Cart\CartController;
use App\Http\Controllers\API\User\UserController;

Route::group(['middleware' => 'territory'], function () {
    
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {

        Route::post('/update-profile', [UserController::class, 'updateProfile']);
        Route::post('/change-password', [UserController::class, 'changePassword']);

        //Route::post('/disable-user', [UserController::class, 'disableUser']);
        //Route::post('/enable-user', [UserController::class, 'enableUser']);

        Route::get('/user', [UserController::class, 'getUser']);
        Route::post('/logout', [UserController::class, 'logout']);

    });

    Route::middleware(['auth:sanctum', 'guest.token'])->group(function () { 
        
        Route::post('/cart/add', [CartController::class, 'store']);
        Route::post('/cart/update', [CartController::class, 'update']);
        Route::post('/orders', [OrderController::class, 'store']);

    });


});













    