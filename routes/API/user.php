<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\API\User\UserController;
use App\Http\Controllers\API\User\AddressController;

Route::group(['middleware' => 'territory'], function () {

    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login']);

    Route::post('/send-otp', [UserController::class, 'sendOtp']);
    Route::post('/verify-otp', [UserController::class, 'verifyOtp']);
  
    Route::post('/verify-email', [UserController::class, 'verifyEmail']);
    Route::post('/reset-password', [UserController::class, 'changePassword']);

    Route::middleware('auth:sanctum')->group(function () {

        Route::post('/update-profile', [UserController::class, 'updateProfile']);
        
        //Route::post('/change-password', [UserController::class, 'changePassword']);
        //Route::post('/disable-user', [UserController::class, 'disableUser']);
        //Route::post('/enable-user', [UserController::class, 'enableUser']);

        Route::get('/user', [UserController::class, 'getUser']);
        Route::post('/logout', [UserController::class, 'logout']);

        Route::apiResource('address', AddressController::class);

    });

    Route::middleware('guest.token')->group(function () { 

      Route::apiResource('address', AddressController::class);

    });

});