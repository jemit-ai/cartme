<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Order\OrderController;

Route::prefix('admin')->name('admin.')->group(function(){

    Route::get('login',[AdminAuthController::class,'loginForm'])->name('login');
    Route::post('login',[AdminAuthController::class,'login']);

    Route::middleware('admin.auth')->group(function(){

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::post('logout',[AdminAuthController::class,'logout'])->name('logout');

        Route::get('users',function(){
            return view('admin.users');
        })->name('users');


        Route::get('products/import', [ProductController::class, 'import'])->name('products.import');
        Route::post('products/import', [ProductController::class, 'importPost'])->name('products.import.post');
        Route::get('products/export-template', [ProductController::class, 'exportTemplate'])->name('products.export-template');
        Route::resource('products', ProductController::class); 


        Route::resource('categories', CategoryController::class);
        Route::resource('orders', OrderController::class);

        



    });

});
