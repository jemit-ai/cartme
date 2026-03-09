<?php

namespace App\Services\Payments;

use App\Services\Payments\Contracts\PaymentGatewayInterface;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Str;

class CashOnDeliveryPaymentService implements PaymentGatewayInterface
{
    public function createPayment(array $data)
    {

            Log::info('create payment data: '.print_r($data, true));
            $order = Order::find($data['order_id']);

            if (!$order) {
                return 'Order not found';
            }

            $gateway_order_id = 'COD-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));

            $payment = Payment::create([
                'order_id' => $data['order_id'],
                'payment_method' => $data['payment_method'],
                'amount' => $order->total_amount,
                'gateway_order_id' => $gateway_order_id,
                'country_id' => $data['country_id'],
                'status' => 'pending',  
            ]);

            $payment = array_merge(
                $payment->toArray(),
                [
                    'signature' => $gateway_order_id
                ]
            );
            
            return $payment;

    }

    public function verifyPayment(array $data)
    {
        //Log::info('Verify payment data: '.print_r($data, true));
        $order_id   = $data['order_id'];
        $payment_id = $data['payment_id'];

        $order = Order::findOrFail($order_id);
        $payment = Payment::findOrFail($payment_id);

        $order->update([
            'status' => 'paid'
        ]);

        $payment->update([
            'status' => 'paid'
        ]);

        $data['order'] = $order; 
        $data['payment'] = $payment; 
        
        return $data;

    }
}