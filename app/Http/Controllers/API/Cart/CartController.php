<?php

namespace App\Http\Controllers\API\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\API\CartRequest;

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
            'message' => 'Cart',
        ]);
    }

    public function update(CartRequest $request)
    {
        return response()->json([
            'message' => 'Cart',
        ]);
    }

    public function destroy(CartRequest $request)
    {
        return response()->json([
            'message' => 'Cart',
        ]);
    }
    
}