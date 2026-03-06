<?php

namespace App\Services\Payments\Contracts;

interface PaymentGatewayInterface
{
    public function charge(array $data);
    public function refund(array $data);
    public function capture(array $data);
    public function void(array $data);
    public function verify(array $data);
    

}