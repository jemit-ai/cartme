<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Category;

class CartApi extends TestCase
{
    use RefreshDatabase;

    protected $product;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a category first since products usually require one
        Category::factory()->create();
        
        // Create a product
        $this->product = Product::factory()->create();
    }

    public function test_add_to_cart()
    {
        $response = $this->postJson('/api/cart/add', [
            'product_id' => $this->product->id,
            'quantity' => 1,
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('cart_items', [
            'product_id' => $this->product->id,
            'quantity' => 1,
        ]);
    }

    /*
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


    public function test_remove_from_cart()
    {
        // First add to cart
        $this->postJson('/api/cart/add', [
            'product_id' => $this->product->id,
            'quantity' => 1,
        ]);
        $response = $this->postJson('/api/cart/remove', [
            'product_id' => $this->product->id,
            'quantity' => 1,
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseMissing('cart_items', [
            'product_id' => $this->product->id,
        ]);

    }


    public function test_get_cart()
    {
        $response = $this->getJson('/api/cart');

        $response->assertStatus(200);
    }
        
    */

}
