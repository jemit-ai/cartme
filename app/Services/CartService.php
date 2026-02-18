<?php
namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; // Ensure session is available if possible
use Throwable;
use Exception; // Use global Exception
use App\Models\Cart;
use App\Models\CartItem;


class CartService
{

    public function addToCart($data, $authId, $userId)
    {

        $product_id = $data['product_id'] ?? null;
        $quantity   = $data['quantity'] ?? null;

        $userId     = $userId ?? 0;
        // Create or Update Cart if not exists

        if (!$productId || !$quantity) {
         return null;
        }

        $cart = Cart::updateOrCreate([
            'user_id'    => $userId,
            'session_id' => $authId
        ]);

        // Add item to cart or update quantity if it already exists
        $cartItem = $cart->items()->where('product_id', $product_id)->first();

        if ($cartItem) {
            $cartItem->increment('quantity', $quantity);
        } else {
            $cart->items()->create([
                'product_id' => $product_id,
                'quantity' => $quantity,
            ]);
        }

        return $cart->load('items.product');
        
    }

    public function updateCart($data, $authId, $userId)
    {
        $userId = $userId ?? 0;

        $product_id = $data['product_id'] ?? null;
        $quantity   = $data['quantity'] ?? null;

        if (!$productId || !$quantity) {
         return null;
        }

        $cart = Cart::forUserSession($userId, $authId)->first();

        if (!$cart) {
            return null;
        }

        $cartItem = $cart->items()->where('product_id', $productId)->first();

        if ($cartItem) {
            $cartItem->update(['quantity' => $quantity]);
        }

        return $cart->load('items.product');
    }

    public function removeFromCart($data, $authId, $userId)
    {
        $userId = $userId ?? 0;

        $product_id = $data['product_id'] ?? null;
        $quantity   = $data['quantity'] ?? null;

        if (!$productId || !$quantity) {
         return null;
        }

        $cart = Cart::forUserSession($userId, $authId)->first();

        if (!$cart) {
            return null;
        }

        $cart->items()->where('product_id', $product_id)->delete();

        return $cart->load('items.product');
    }

    public function getCart($authId, $userId)
    {
        $userId = $userId ?? 0;

        return Cart::where('user_id', $userId)
            ->where('session_id', $authId)
            ->with(['items.product'])
            ->first();
    }
}