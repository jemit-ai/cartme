<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Payments\PaymentManager;
use App\Http\Controllers\API\BaseApiController;


class PaymentController extends BaseApiController
{
    
    public function createPayment(Request $request)
    {
        $paymentService = PaymentManager::gateway($request->payment_method);
        $payment = $paymentService->createPayment($request->all());
        return $this->successResponse($payment, 'Payment created successfully', 201);
    }

    public function verifyPayment(Request $request)
    {
        $paymentService = PaymentManager::gateway($request->payment_method);
        $payment = $paymentService->verifyPayment($request->all());
        return $this->successResponse($payment, 'Payment verified successfully', 200); 
    }

}
