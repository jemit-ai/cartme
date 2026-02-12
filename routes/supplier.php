<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Supplier\AuthController as SupplierAuthController;

Route::prefix('supplier')->name('supplier.')->group(function(){

    Route::get('login',[SupplierAuthController::class,'loginForm'])->name('login');
    Route::post('login',[SupplierAuthController::class,'login']);

    Route::middleware('supplier.auth')->group(function(){

        Route::get('dashboard',function(){
            return view('supplier.dashboard');
        })->name('dashboard');

        Route::post('logout',[SupplierAuthController::class,'logout'])->name('logout');

    });

});