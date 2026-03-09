<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Payments\PaymentManager;
use App\Http\Requests\API\Payment\PaymentRequest;
use App\Http\Requests\API\Payment\PaymentVerifyRequest;
use App\Http\Controllers\API\BaseApiController;
use Illuminate\Support\Facades\Log;
use App\Models\Order;

class PaymentController extends BaseApiController
{
    
    public function createPayment(PaymentRequest $request)
    {
        $data = $request->validated();

        $data['guest_token'] = $request->header('X-Guest-Token');
        $data['user_id'] = $request->user()?->id ?? 0;

        try{

          $paymentService = PaymentManager::gateway($request->payment_method);
          $payload = array_merge($request->all(), $data);
          $payment = $paymentService->createPayment($payload);

          Log::info('payment created response', ['payment' => $payment]);
          return $this->successResponse($payment, 'Payment created successfully', 201);

        }catch(Exception $e){
          
            Log::error($e->getMessage());
            return $this->errorResponse($e->getMessage(), $e->getMessage(), 500); 

        }
        
    }

    public function verifyPayment(PaymentVerifyRequest $request)
    {
        $data = $request->validated();

        $data['guest_token'] = $request->header('X-Guest-Token');
        $data['user_id'] = $request->user()?->id ?? 0;

        $payload = array_merge($request->all(), $data);

        try{

            $order = Order::find($payload['order_id']);
            $paymentService = PaymentManager::gateway($order->payment_method);
            $payment = $paymentService->verifyPayment($data);
            return $this->successResponse($payment, 'Payment verified successfully', 200);

        }catch(Exception $e){

            Log::error($e->getMessage());
            return $this->errorResponse($e->getMessage(), $e->getMessage(), 500); 

        } 
    }

}
