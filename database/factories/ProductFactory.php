<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Country;
use App\Models\Product;
use App\Models\Category;
use App\Services\CurrencyService;
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

                    //$price=$product->price*91.16;
                    $price = (new CurrencyService)->convert($product->price, 'INR', 'USD');


                }elseif($country->currency=='GBP'){

                    //$price=$product->price*123.02;
                    $price = (new CurrencyService)->convert($product->price, 'INR', 'GBP');
                    
                }else{

                    //$price=$product->price;
                    $price = (new CurrencyService)->convert($product->price, 'INR', 'INR');
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

            $category = Category::inRandomOrder()->first();

            if ($category) {
                $product->category()->attach($category->id);
            }

        });
    }

}
