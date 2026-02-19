<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Country;

class ProductFactoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
   

    public function test_product_factory_creates_product_with_countries(){

        // Seed the exact countries that ProductFactory::configure() looks for
        Country::factory()->create(['name' => 'India',          'iso2' => 'IN', 'currency' => 'INR', 'currency_symbol' => '₹']);
        Country::factory()->create(['name' => 'United States',  'iso2' => 'US', 'currency' => 'USD', 'currency_symbol' => '$']);
        Country::factory()->create(['name' => 'United Kingdom', 'iso2' => 'GB', 'currency' => 'GBP', 'currency_symbol' => '£']);

        $product = Product::factory()->create();

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
        ]);

        // The factory's configure() should have attached 3 countries
        $this->assertCount(3, $product->fresh()->countries);

        foreach ($product->fresh()->countries as $country) {
            $this->assertDatabaseHas('product_country', [
                'product_id' => $product->id,
                'country_id' => $country->id,
                'status' => true
            ]);
        }
    }


    public function it_creates_multiple_products_with_country_relations()
    {
        //Country::factory()->count(10)->create();

        /*$products = Product::factory()->count(5)->create();

        foreach ($products as $product) {
            $this->assertCount(4, $product->countries);
        }*/
    }

    



}
