<?php

namespace App\Http\Controllers\Api\Order;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Http\Requests\API\Order\OrderRequest;
use App\Http\Requests\API\Order\GuestOrderRequest;
use App\Http\Controllers\API\BaseApiController;
use Illuminate\Support\Facades\Log;

class OrderController extends BaseApiController
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function store(OrderRequest $request)
    {

        $data = $request->validated();

        $data['guest_token'] = $request->header('X-Guest-Token');
        $data['user_id'] = $request->user()?->id ?? null;

        try{

            $payload = array_merge($request->all(), $data);
            $order = $this->orderService->createOrder($payload);
            return $this->successResponse($order, 'Order created successfully', 201);

        }catch(Exception $e){

            Log::error($e->getMessage());
            return $this->errorResponse($e->getMessage(), $e->getMessage(), 500);

        }
    
    }

    public function createGuestOrder(GuestOrderRequest $request)
    {

        $data = $request->validated();

        Log::info('Guest Controller Order Data: ' . json_encode($data));

        $data['guest_token'] = $request->header('X-Guest-Token');
        $data['user_id'] = $request->user()?->id ?? null;
        
        try{

            $payload = array_merge($request->all(), $data);
            $order = $this->orderService->createGuestOrder($payload);
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
