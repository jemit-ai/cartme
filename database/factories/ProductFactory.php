<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Country;
use App\Models\Product;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class ProductFactory extends Factory
{
    
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'sku' => $this->faker->unique()->bothify('PROD-####'),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'stock' => $this->faker->numberBetween(0, 100),
            'image' => $this->faker->imageUrl(),
            'status' => true
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Product $product) {

            $countries = Country::whereIn('iso2', ['IN', 'US', 'GB'])->get();

            foreach ($countries as $country) {

                if($country->currency=='USD'){

                    $price=$product->price*91.16;

                }elseif($country->currency=='GBP'){

                    $price=$product->price*123.02;
                    
                }else{

                    $price=$product->price;
                }

                $product->countries()->attach($country->id, [
                    'price' => $price,
                    'currency_code' => $country->currency,
                    'status' => true
                ]);

            }


        });
    }


    public function categoryAttachment()
    {
        return $this->afterCreating(function (Product $product) {

            $categories = Category::inRandomOrder()->first();

            foreach ($categories as $category) {

                $product->category()->attach($category->id, [
                   
                    'category_id' => $category->id,
                    'product_id' => $product->id,

                ]);

            }

        });
    }

}
