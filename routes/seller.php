<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seller\AuthController as SellerAuthController;


Route::prefix('seller')->name('seller.')->group(function(){

    Route::get('login',[SellerAuthController::class,'loginForm'])->name('login');
    Route::post('login',[SellerAuthController::class,'login']);

    Route::middleware('seller.auth')->group(function(){

        Route::get('dashboard',function(){
            return view('seller.dashboard');
        })->name('dashboard');
        
        Route::post('logout',[SellerAuthController::class,'logout'])->name('logout');
    });

});