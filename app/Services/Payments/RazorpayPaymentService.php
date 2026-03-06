<?php

namespace App\Services\Payments;

use App\Services\Payments\Contracts\PaymentGatewayInterface;

class RazorpayPaymentService implements PaymentGatewayInterface
{
    public function charge(array $data)
    {
        Log::info('Razorpay charge method called');
        // TODO: Implement charge method.
    }

    public function refund(array $data)
    {
        Log::info('Razorpay refund method called');

        // TODO: Implement refund method.
    }

    public function capture(array $data)
    {
        Log::info('Razorpay capture method called');
        // TODO: Implement capture method.
    }

    public function void(array $data)
    {
        
        // TODO: Implement void method.
    }

    public function verify(array $data)
    {
        // TODO: Implement verify method.
    }
}