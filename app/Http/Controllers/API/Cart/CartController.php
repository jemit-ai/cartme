<?php
namespace App\Http\Controllers\API\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\API\CartRequest;
use App\Services\CartService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\API\BaseApiController;
use Exception;

class CartController extends BaseApiController
{

    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    
    public function store(CartRequest $request)
    {
        $data   = $request->validated();
        $authId = $request->header('authid'); // Guest User 
        $userId = $request->user()?->id ?? 0; // login User

        try {

            $cart = $this->cartService->addToCart($data, $authId, $userId);

            return $this->successResponse(
                $cart,
                'Cart item added successfully',
                201
            );

        } catch (Exception $e) {

            return $this->errorResponse(
                'Failed to create cart',
                $e->getMessage(),
                500
            );
        }
    }

    public function update(CartRequest $request)
    {
        $data = $request->validated();
        $authId = $request->header('authid');
        $userId = $request->user()?->id ?? 0;

        try {

            $cart = $this->cartService->updateCart($data, $authId, $userId);
            return $this->successResponse($cart, 'Cart updated successfully');

        } catch (Exception $e) {

            return $this->errorResponse('Failed to update cart', $e->getMessage(), 500);

        }

    }

    public function destroy(CartRequest $request)
    {
        $data = $request->validated();
        $authId = $request->header('authid');
        $userId = $request->user()?->id ?? 0;

        try {

            $cart = $this->cartService->removeFromCart($data, $authId, $userId);
            return $this->successResponse($cart, 'Item removed from cart successfully');

        } catch (Exception $e) {

            return $this->errorResponse('Failed to remove item from cart', $e->getMessage(), 500);

        }
    }

    public function get(Request $request)
    {
        $authId = $request->header('authid');
        $userId = $request->user()?->id ?? 0;

        try {

            $cart = $this->cartService->getCart($authId, $userId);
            return $this->successResponse($cart, 'Cart retrieved successfully');

        } catch (Exception $e) {

            return $this->errorResponse('Failed to retrieve cart', $e->getMessage(), 500);
            
        }
    }
}