<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Product\CategoryController;

Route::group(['middleware' => 'territory'], function () {

    Route::get('/products', [ProductController::class, 'index']);
    
    Route::get('/categories', [CategoryController::class, 'getCategories']);

    Route::middleware('guest.token')->group(function () { 

     // Route::get('/products', [ProductController::class, 'getProducts']);

    });

});