<?php

namespace Tests\Feature\API\Payment;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Order;
use App\Models\User;

class CreatePaymentTest extends TestCase
{
    /*
    public function test_create_payment()
    {
        $this->actingAsGuest();

        $order = Order::factory()->create();

        $response = $this->postJson('/api/guest/create-payment', [
            'payment_method' => 'cod',
            'order_id' => $order->id,
        ]);

        $response->assertStatus(200);
    }

    public function test_create_payment_with_invalid_payment_method()
    {
        $this->actingAsGuest();

        $order = Order::factory()->create();

        $response = $this->postJson('/api/guest/create-payment', [
            'payment_method' => 'invalid',
            'order_id' => $order->id,
        ]);

        $response->assertStatus(400);
    }

    public function test_create_payment_with_invalid_order_id()
    {
        $this->actingAsGuest();

        $response = $this->postJson('/api/guest/create-payment', [
            'payment_method' => 'cod',
            'order_id' => 90,
        ]);

        $response->assertStatus(404);
    }
    */

    public function test_create_payment_with_user_id()
    {
        //$this->actingAsUser();

        $order = Order::factory()->create();
        $user = User::factory()->withAddresses()->create();

        $response = $this->actingAs($user)->postJson('/api/create-payment', [
            'payment_method' => 'cod',
            'order_id' => $order->id,
        ]);

        $response->assertStatus(201);
    }

}
