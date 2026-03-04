<?php

namespace App\Http\Controllers\Api\Order;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Http\Requests\API\Order\OrderRequest;


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
        try{

            $order = $this->orderService->createOrder($data);
            return $this->successResponse($order, 'Order created successfully', 201);

        }catch(Exception $e){

            Log::error($e->getMessage());
            return $this->errorResponse($e->getMessage(), $e->getMessage(), 500);

        }
    
    }

    public function createGuestOrder(OrderRequest $request)
    {

        $data = $request->validated();
        try{

            $order = $this->orderService->createGuestOrder($data);
            return $this->successResponse($order, 'Order created successfully', 201);

        }catch(Exception $e){

            Log::error($e->getMessage());
            return $this->errorResponse($e->getMessage(), $e->getMessage(), 500);

        }
    
    }

    public function index()
    {
        try {
            $orders = $this->orderService->getAllOrders();
            return $this->successResponse($orders, 'Orders fetched successfully', 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this->errorResponse($e->getMessage(), $e->getMessage(), 500);
        }
    }

    public function show($id)
    {
        try {
            $order = $this->orderService->getOrderById($id);
            return $this->successResponse($order, 'Order fetched successfully', 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this->errorResponse($e->getMessage(), $e->getMessage(), 500);
        }
    }

    public function cancel($id)
    {
        try {
            $order = $this->orderService->cancelOrder($id);
            return $this->successResponse($order, 'Order cancelled successfully', 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this->errorResponse($e->getMessage(), $e->getMessage(), 500);
        }
    }
    
}
