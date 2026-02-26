<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Cart\CartController;

Route::group(['middleware' => 'territory'], function () {

    Route::middleware('auth:sanctum')->group(function () {
   
        Route::post('/cart/add', [CartController::class, 'store']);
        Route::post('/cart/update', [CartController::class, 'update']);
        Route::post('/cart/remove', [CartController::class, 'destroy']);
        Route::get('/cart', [CartController::class, 'get']);
      
    });

    Route::middleware(['guest.token'])->group(function () { 
         
        Route::post('/cart/add', [CartController::class, 'store']);
        Route::post('/cart/update', [CartController::class, 'update']);
        Route::post('/cart/remove', [CartController::class, 'destroy']);
        Route::get('/cart', [CartController::class, 'get']);
      
    });


});
