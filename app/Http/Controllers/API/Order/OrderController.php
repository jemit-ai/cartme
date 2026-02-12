<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Http\Requests\API\OrderRequest;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function store(OrderRequest $request)
    {
        $data = $request->validated();

        //event fire

        $order = $this->orderService->createOrder($data);

        return response()->json([
            'message' => 'Order created successfully',
            'order' => $order
        ], 201);
    
    }
    
}
