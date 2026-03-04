<?php

namespace Tests\Feature\API\Order;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Traits\ApiResponse;


class OrderGuestTest extends TestCase
{
    
    public function test_guest_can_create_order()
    {

        $product = Product::factory()->create();

        $response = $this->postJson('/api/guest/order', [
            'billing_first_name' => 'John',
            'billing_last_name' => 'Doe',
            'billing_email' => 'jjj@gmail.com',
            'billing_phone' => '1234567890',
            'billing_address' => '123 Main St',
            'billing_city' => 'New York',
            'billing_state' => 'New York',
            'billing_postcode' => '12345',
            'billing_country' => 'IND',
            'payment_method' => 'cod',
            'order_items' => [
                [
                    'product_id' => $product->id,
                    'quantity' => 1,
                    'price' => $product->price,
                ],
            ],
            
        ]);

        $response->assertStatus(201);


        
    }
    
}
