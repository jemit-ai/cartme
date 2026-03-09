<?php

namespace Tests\Feature\API\Payment;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VerifyPaymentTest extends TestCase
{
    
    public function test_verify_payment()
    {
        $user = User::factory()->withAddresses()->create();
        $order = Order::factory()->create();
        $this->actingAs($user);

        /*
        'order_id' => 'required|numeric|exists:orders,id',
        'payment_id' => 'required|string',
        'signature' => 'required|string',
        */

        $response = $this->postJson('/api/verify-payment', [
            'order_id' => 1,
            'payment_method' => 'cod',
            'amount' => 100,
            'signature' => 'COD-2022-01-01-000000',
        ]);

        $response->assertStatus(200);
    }



}
