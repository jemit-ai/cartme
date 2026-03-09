<?php

namespace Tests\Feature\API\Payment;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Order;
use App\Models\Country;
use App\Models\Payment;


class VerifyPaymentTest extends TestCase
{
    
    public function test_verify_payment()
    {
        $user = User::factory()->withAddresses()->create();

        $order = Order::factory()->create();
       
        $payment = Payment::factory()->create([
            'order_id' => $order->id,
            'payment_method' => $order->payment_method,
            'gateway_order_id' => 'COD-2022-01-01-000000',
            'amount' => $order->total_amount,
            'status' => 'pending',
            'country_id' => $order->country_id,
        ]);


        $this->actingAs($user);

        /*
        'order_id' => 'required|numeric|exists:orders,id',
        'payment_id' => 'required|string',
        'signature' => 'required|string',
        */

        $response = $this->postJson('/api/verify-payment', [
            'order_id' => $order->id,
            'payment_id' => $payment->id,
            'signature' => $order->payment->gateway_order_id,
        ]);

        $response->assertStatus(200);
    }



}
