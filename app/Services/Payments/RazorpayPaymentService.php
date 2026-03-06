<?php

namespace App\Services\Payments;

use App\Services\Payments\Contracts\PaymentGatewayInterface;
use Exception;
use Illuminate\Support\Facades\Log;
use Razorpay\Api\Api;

class RazorpayPaymentService implements PaymentGatewayInterface
{

    protected $razorpay;

    public function __construct()
    {
        $this->razorpay = new Api(config('services.razorpay.key_id'), config('services.razorpay.key_secret'));
    }

    public function createPayment(array $data)
    {
        
        try {

            $order = $this->razorpay->order->create([
                'receipt' => $data['receipt'] ?? uniqid(),
                'amount' => $data['amount'] * 100, // Razorpay expects paise
                'currency' => $data['currency'] ?? 'INR',
                'payment_capture' => 1
            ]);

            return $order;
             
        } catch (Exception $e) {

            Log::error('Razorpay create payment error', [
                'message' => $e->getMessage()
            ]);

            return $e->getMessage();

        }

    }

    public function verifyPayment(array $data)
    {
        try {

            $attributes = [
                'razorpay_order_id' => $data['razorpay_order_id'],
                'razorpay_payment_id' => $data['razorpay_payment_id'],
                'razorpay_signature' => $data['razorpay_signature']
            ];

            $verify=$this->razorpay->utility->verifyPaymentSignature($attributes);

            return $verify;

        } catch (Exception $e) {

            Log::error('Razorpay verify payment error', [
                'message' => $e->getMessage()
            ]);

            return $e->getMessage();

        }
    }
}