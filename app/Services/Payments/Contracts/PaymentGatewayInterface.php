<?php

namespace App\Services\Payments\Contracts;

interface PaymentGatewayInterface
{
    
    public function createPayment(array $data);

    public function verifyPayment(array $data);

}