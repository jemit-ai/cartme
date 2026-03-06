<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Order\PaymentController;

Route::group(['middleware' => 'territory'], function () {

 
    Route::middleware('auth:sanctum')->group(function () {

        Route::post('/create-payment', [PaymentController::class, 'createPayment']);
        Route::post('/verify-payment', [PaymentController::class, 'verifyPayment']);

    });

    Route::middleware(['guest.token'])->group(function () { 

        Route::post('/create-payment', [PaymentController::class, 'createPayment']);
        Route::post('/verify-payment', [PaymentController::class, 'verifyPayment']);

    });


});




