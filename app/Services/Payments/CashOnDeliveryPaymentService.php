<?php

namespace App\Services\Payments;

use App\Services\Payments\Contracts\PaymentGatewayInterface;
use Exception;
use Illuminate\Support\Facades\Log;

class CashOnDeliveryPaymentService implements PaymentGatewayInterface
{
    public function createPayment(array $data)
    {
        
        return $data;

    }

    public function verifyPayment(array $data)
    {

        return $data;

    }
}