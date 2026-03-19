<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Cart\CartController;
use App\Http\Controllers\Api\Order\OrderController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\API\User\UserController;
use App\Http\Controllers\API\User\AddressController;
use App\Http\Controllers\API\Product\ProductController;

require __DIR__.'/API/cart.php';

require __DIR__.'/API/order.php';

require __DIR__.'/API/user.php';

require __DIR__.'/API/payment.php';

require __DIR__.'/API/product.php';




