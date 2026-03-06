<?php

namespace App\Services\Payments;

use App\Services\Payments\Contracts\PaymentGatewayInterface;
use App\Services\Payments\RazorpayPaymentService;
use App\Services\Payments\PaypalPaymentService;
use App\Services\Payments\CashOnDeliveryPaymentService;

class PaymentManager
{
   public static function gateway(string $method) 
    {
        return match ($method) {
            'razorpay' => new RazorpayPaymentService(),
            'paypal' => new PaypalPaymentService(),
            'cod' => new CashOnDeliveryPaymentService(),
            default => throw new \Exception('Payment gateway not supported')
        };
    }
}