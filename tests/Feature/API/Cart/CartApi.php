<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;


class CartApi extends TestCase
{
    //use RefreshDatabase;

    protected $product;

    protected $token;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a category first since products usually require one
        Category::factory()->create();
        
        // Create a product
        $this->product = Product::factory()->create();

        $this->user = User::factory()->create();

        $this->token =  $this->user->createToken('test')->plainTextToken;
    }

    /*
    public function test_add_to_cart_guest()
    {
        $response = $this->withHeaders([
            'X-Country' => 'IN',
            'X-Guest-Token' => '1234567890',
        ])->postJson('/api/cart/add', [
            'product_id' => $this->product->id,
            'quantity' => 1,
        ]);

        //$response->assertStatus(201);
        Log::info('Cart Add Response Guest User: ' . $response->getContent());
        
        $cartId = $response->json('data.id');

        Log::info('Cart ID: ' . $cartId);

        $this->assertNotNull($cartId, "Cart ID should not be null in response");

        // Verify Cart entry
        $this->assertDatabaseHas('carts', [
            'id' => $cartId,
        ]);

        // Verify CartItem entry
        $this->assertDatabaseHas('cart_items', [
            'cart_id' => $cartId,
            'product_id' => $this->product->id,
            'quantity' => 1,
        ]);
    }

    public function test_add_to_cart_user()
    {   
       

        $response = $this->withHeaders([
            'X-Country' => 'IN',
            'Authorization' => 'Bearer ' . $token,
        ])->actingAs($user)->postJson('/api/cart/add', [
            'product_id' => $this->product->id,
            'quantity' => 1,
        ]);

        //$response->assertStatus(201);
        Log::info('Cart Add Response Login User: ' . $response->getContent());
        
        $cartId = $response->json('data.id');

        Log::info('Cart ID: ' . $cartId);

        $this->assertNotNull($cartId, "Cart ID should not be null in response");

        // Verify Cart entry
        $this->assertDatabaseHas('carts', [
            'id' => $cartId,
        ]);

        // Verify CartItem entry
        $this->assertDatabaseHas('cart_items', [
            'cart_id' => $cartId,
            'product_id' => $this->product->id,
            'quantity' => 1,
        ]);
    }

    */
    

    /*
    public function test_update_cart_guest()
    {
        $response = $this->withHeaders([
            'X-Country' => 'IN',
            'X-Guest-Token' => '1234567890',
        ])->postJson('/api/cart/update', [
            'product_id' => 23,
            'quantity' => 4,
        ]);

        Log::info('Cart Update Guest User Response: ' . $response->getContent());

        $response->assertStatus(200);

        $this->assertDatabaseHas('cart_items', [
            'product_id' => 23,
            'quantity' => 4,
        ]);
    }

    public function test_update_cart()
    {
        // First add to cart
        $this->postJson('/api/cart/add', [
            'product_id' => $this->product->id,
            'quantity' => 1,
        ]);

        $response = $this->postJson('/api/cart/update', [
            'product_id' => $this->product->id,
            'quantity' => 2,
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('cart_items', [
            'product_id' => $this->product->id,
            'quantity' => 2,
        ]);
    }
    */

    public function test_remove_from_cart()
    {
        // First add to cart
        $response = $this->withHeaders([
            'X-Country' => 'IN',
            'Authorization' => 'Bearer ' . $this->token,
        ])->actingAs($this->user)->postJson('/api/cart/add', [
            'product_id' => $this->product->id,
            'quantity' => 1,
        ]);

        $response->assertStatus(201);

        $response = $this->withHeaders([
            'X-Country' => 'IN',
            'Authorization' => 'Bearer ' . $this->token,
        ])->actingAs($this->user)->postJson('/api/cart/remove', [
            'product_id' => $this->product->id,
            'quantity' => 1,
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseMissing('cart_items', [
            'product_id' => $this->product->id,
        ]);

    }

    /*
    public function test_get_cart()
    {
        // Add something so it's not empty
        $this->postJson('/api/cart/add', [
            'product_id' => $this->product->id,
            'quantity' => 1,
        ]);

        $response = $this->getJson('/api/cart');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'message',
            'cart' => [
                'id',
                'items'
            ]
        ]);
    }
    */

}
