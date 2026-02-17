<?php

namespace App\Http\Controllers\API\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\API\CartRequest;
use App\Services\CartService;

class CartController extends Controller
{

    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    
    public function store(CartRequest $request)
    {
        $data = $request->validated();
        $cart = $this->cartService->addToCart($data);

        return response()->json([
            'message' => 'Cart created successfully',
            'cart' => $cart
        ], 201);

    }

    public function update(CartRequest $request)
    {
        $data = $request->validated();
        $cart = $this->cartService->updateCart($data);

        return response()->json([
            'message' => 'Cart updated successfully',
            'cart' => $cart
        ], 200);

    }

    public function destroy(CartRequest $request)
    {
        $data = $request->validated();
        $cart = $this->cartService->removeFromCart($data);

        return response()->json([
            'message' => 'Cart removed successfully',
            'cart' => $cart
        ], 200);
    }

    public function get(Request $request)
    {
        $data = $request->all();
        $cart = $this->cartService->getCart($data);

        return response()->json([
            'message' => 'Cart retrieved successfully',
            'cart' => $cart
        ], 200);
    }

}