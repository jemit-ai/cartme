<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Currency;
use App\Models\Country;
use App\Models\Category;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'user_id' => User::factory(),
            'total_amount' => $this->faker->randomFloat(2, 10, 1000),
            'status' => $this->faker->randomElement(['pending', 'processing', 'shipped', 'delivered', 'cancelled']),
            'billing_first_name' => $this->faker->firstName,
            'billing_last_name' => $this->faker->lastName,
            'billing_email' => $this->faker->email,
            'billing_phone' => $this->faker->phoneNumber,
            'billing_address' => $this->faker->address,
            'billing_city' => $this->faker->city,
            'billing_state' => $this->faker->state,
            'billing_postcode' => $this->faker->postcode,
            'billing_country' => $this->faker->country,
            'payment_method' => $this->faker->randomElement(['credit_card', 'paypal', 'bank_transfer']),
            
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Order $order) {

            $products = Product::inRandomOrder()->take(3)->get();

            foreach ($products as $product) {
                $order->products()->attach($product->id, [
                    'quantity' => $this->faker->numberBetween(1, 5),
                    'price' => $product->price,
                ]);
            }

            
            //$order->products()->attach(Product::factory()->create());
        });
    }
}
