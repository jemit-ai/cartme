<?php

namespace App\Services\Payments;

use App\Services\Payments\Contracts\PaymentGatewayInterface;

class PaypalPaymentService implements PaymentGatewayInterface
{
    public function charge(array $data)
    {
        Log::info('Paypal charge method called');
        // TODO: Implement charge method
    }

    public function refund(array $data)
    {
        Log::info('Paypal refund method called');
        // TODO: Implement refund method
    }

    public function capture(array $data)
    {
    
        // TODO: Implement capture method
    }

    public function void(array $data)
    {
        // TODO: Implement void method
    }

    public function verify(array $data)
    {
        // TODO: Implement verify method
    }
}