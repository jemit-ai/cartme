<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Supplier\AuthController as SupplierAuthController;
use App\Http\Controllers\Seller\AuthController as SellerAuthController;

require __DIR__.'/admin.php';

require __DIR__.'/supplier.php';

require __DIR__.'/seller.php';

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');