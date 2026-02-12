<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use Laravel\Sanctum\Sanctum;
use App\Http\Requests\API\OrderRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class OrderApiTest extends TestCase
{
    //use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    
    public function test_order_creation()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();
        
        $response = $this->postJson('/api/orders', [
            'billing_first_name' => 'John',
            'billing_last_name' => 'Doe',
            'billing_email' => $user->email,
            'billing_phone' => '1234567890',
            'billing_address' => '123 Main St',
            'billing_city' => 'Anytown',
            'billing_state' => 'CA',
            'billing_postcode' => '12345',
            'billing_country' => 'USA',
            'payment_method' => 'cash',
            'order_items' => [
                [
                    'product_id' => $product->id,
                    'quantity' => 1,
                ],
            ],
        ]);

        $response->assertStatus(201);
        $response->assertJsonCount(1, 'order.items');
        //$this->assertDatabaseHas('orders', ['user_id' => $user->id]);
        $this->assertDatabaseHas('order_details_product', [
            'product_id' => $product->id,
            'quantity' => 1
        ]);
    }

    public function test_order_create_validation_error()
    {
        $user = User::factory()->create();

        //$this->actingAs($user, 'api');

        $response = $this->postJson('/api/orders', []);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors([
                     'billing_first_name',
                     'billing_email',
                     'payment_method',
                 ]);
    }   

    public function test_order_not_exist_product_creation()
    {
        $user = User::factory()->create();
        //$product = Product::find(903);
        
        $response = $this->postJson('/api/orders', [
            'billing_first_name' => 'John',
            'billing_last_name' => 'Doe',
            'billing_email' => $user->email,
            'billing_phone' => '1234567890',
            'billing_address' => '123 Main St',
            'billing_city' => 'Anytown',
            'billing_state' => 'CA',
            'billing_postcode' => '12345',
            'billing_country' => 'USA',
            'payment_method' => 'cash',
            'order_items' => [
                [
                    'product_id' => 903,
                    'quantity' => 1,
                ],
            ],
        ]);

        $response->assertStatus(422); // or 404
        

    }

}
