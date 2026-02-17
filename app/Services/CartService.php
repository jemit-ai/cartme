<?php
namespace App\Services;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Throwable;
use Exception;
use App\Models\Admin;

class CartService
{
    public function addToCart($data)
    {
        try {

            $cart = Cart::create($data);
            return $cart;

        } catch (Exception $e) {

            Log::error($e->getMessage());
            return null;
            
        }
    }

    public function updateCart($data)
    {
        try {
            $cart = Cart::update($data);
            return $cart;
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return null;
        }
    }

    public function removeFromCart($data)
    {
        try {
            $cart = Cart::remove($data);
            return $cart;
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return null;
        }
    }

    public function getCart($data)
    {
        try {
            $cart = Cart::get($data);
            return $cart;
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return null;
        }
    }
}


