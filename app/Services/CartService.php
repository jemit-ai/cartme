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

    public function addToCart_old($data, $authId, $userId)
    {

        $product_id = $data['product_id'] ?? null;
        $quantity   = $data['quantity'] ?? null;

        $userId     = $userId ?? 0;
        // Create or Update Cart if not exists

        if (!$product_id || !$quantity) {
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

    public function addToCart($data)
    {

        $product_id = $data['product_id'] ?? null;
        $quantity   = $data['quantity'] ?? null;
        
        $guest_token = $data['guest_token'] ?? null;
        $user_id = $data['user_id'] ?? null;

        Log::info('Add to Cart Data: ' . json_encode($data));

        // $userId     = $userId ?? 0;
        // Create or Update Cart if not exists

        if (!$product_id || !$quantity) {
         return null;
        }

        $cart = Cart::updateOrCreate([
            'user_id'    => $user_id,
            'session_id' => $guest_token 
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


    public function updateCart($data)
    {

        $guest_token = $data['guest_token'] ?? null;
        $user_id     = $data['user_id'] ?? null;

        $product_id  = $data['product_id'] ?? null;
        $quantity    = $data['quantity'] ?? null;

        if (!$product_id || !$quantity) {
         return null;
        }


        $cart = Cart::forUserSession($user_id, $guest_token)->first();

        if (!$cart) {
            return null;
        }

        $cartItem = $cart->items()->where('product_id', $product_id)->first();

        if ($cartItem) {
            $cartItem->update(['quantity' => $quantity]);
        }

        return $cart->load('items.product');
    }

    public function removeFromCart($data){

        $guest_token = $data['guest_token'] ?? null;
        $user_id     = $data['user_id'] ?? null;

        $product_id  = $data['product_id'] ?? null;
        $quantity    = $data['quantity'] ?? null;

        if (!$product_id || !$quantity) {
            return null;
        }

        $cart = Cart::forUserSession($user_id, $guest_token)->first();

        if (!$cart) {
            return null;
        }

        $cartItem = $cart->items()->where('product_id', $product_id)->first();

        
        if ($cartItem) {
           
                $cartItem->delete();
          
        }
            
        return true;

    }
    
    public function getCart($data)
    {

        $guest_token = $data['guest_token'] ?? null;
        $user_id     = $data['user_id'] ?? null;

        //Log::info('Cart Query #4: ' . Cart::forUserSession($user_id, $guest_token)->with(['items.product'])->toSql());

        //return Cart::forUserSession($user_id, $guest_token)->with(['items.product'])->first();

        $cart = Cart::forUserSession($user_id, $guest_token)->with([ 
                            'items.product'
                        ])->first();
           
        $items = $cart->items->map(function ($item) {
            return [
                'id' => $item->id,
                'product' => $item->product->name,
                'image' => $item->product->image,
                'quantity' => $item->quantity,
                'price' => $item->product->price, 
                'total' => number_format($item->quantity * $item->product->price, 2, '.', '')
            ];
        });

        $subTotal = $cart->items->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        return [
            'items' => $items,
            'sub_total' => number_format($subTotal, 2, '.', ''),
            'main_total' => number_format($subTotal, 2, '.', '')
        ];
        
    }

    public static function mergeGuestCartToUser($sessionId, $userId)
    {
        $guestCartItems = Cart::where('session_id', $sessionId)->get();

        foreach ($guestCartItems as $item) {

            $existingItem = Cart::where('user_id', $userId)
                ->where('product_id', $item->product_id)
                ->first();

            if ($existingItem) {

                // Merge quantities
                $existingItem->quantity += $item->quantity;
                $existingItem->save();

                // Remove guest item
                $item->delete();

            } else {

                // Assign guest cart to user
                $item->update([
                    'user_id' => $userId,
                    'session_id' => null
                ]);
            }
        }
    }
    
}