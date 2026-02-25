<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Order\OrderController;

Route::group(['middleware' => 'territory'], function () {

    Route::middleware('auth:sanctum')->group(function () {

        //Order Routes 
        Route::post('/orders', [OrderController::class, 'store']);      // Place order
        Route::get('/orders', [OrderController::class, 'index']);        // List user orders
        Route::get('/orders/{id}', [OrderController::class, 'show']);     // Order details
        Route::post('/orders/{id}/cancel', [OrderController::class, 'cancel']); // Cancel order

    });

    Route::middleware(['guest.token'])->group(function () { 

        Route::post('/orders', [OrderController::class, 'store']);      // Place order
        Route::get('/orders', [OrderController::class, 'index']);        // List user orders
        Route::get('/orders/{id}', [OrderController::class, 'show']);     // Order details
        Route::post('/orders/{id}/cancel', [OrderController::class, 'cancel']); // Cancel order
        
    });


});