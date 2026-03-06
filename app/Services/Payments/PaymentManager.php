<?php

namespace App\Services\Payments;

use App\Services\Payments\Contracts\PaymentGatewayInterface;
use App\Services\Payments\RazorpayPaymentService;
use App\Services\Payments\PaypalPaymentService;

class PaymentManager
{
   public static function gateway(string $method)
    {
        return match ($method) {
            'razorpay' => new RazorpayPaymentService(),
            'paypal' => new PaypalPaymentService(),
            default => throw new \Exception('Payment gateway not supported')
        };
    }
}