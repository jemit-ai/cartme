<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Payments\PaymentManager;
use App\Http\Requests\API\Payment\PaymentRequest;
use App\Http\Requests\API\Payment\PaymentVerifyRequest;
use App\Http\Controllers\API\BaseApiController;
use Illuminate\Support\Facades\Log;

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

          $respone=$this->successResponse($payment, 'Payment created successfully', 201);
          Log::log($respone);
          return $this->successResponse($respone, 'Payment created successfully', 201);

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
        
        $paymentService = PaymentManager::gateway($request->payment_method);
        $payment = $paymentService->verifyPayment($data);
        return $this->successResponse($payment, 'Payment verified successfully', 200); 
    }

}
