<?php

namespace Tests\Feature\API\Order;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Traits\ApiResponse;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class OrderTest extends TestCase
{
    
    public function test_user_can_create_order()
    {

        $user = User::factory()->withAddresses()->create();
        $product = Product::factory()->create();

        $response = $this->actingAs($user)->postJson('/api/order', [
            //'shipping_address' => $user->addresses()->first()->id,
            'payment_method' => 'cod',
            'order_items' => [
                [
                    'product_id' => $product->id,
                    'quantity' => 1,
                    'price' => $product->price,
                ],
            ],
            
        ]);

        Log::info('order data: '.print_r($response->json(), true));
        
        $response->assertStatus(201);
        
    }
    

}
