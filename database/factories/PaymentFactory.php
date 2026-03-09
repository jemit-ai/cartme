<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\Country;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'payment_method' => $this->faker->randomElement(['cod', 'stripe', 'paypal']),
            'amount' => $this->faker->numberBetween(100, 1000),
            'gateway_order_id' => $this->faker->uuid,
            'country_id' => Country::factory(),
            'status' => $this->faker->randomElement(['pending', 'success', 'failed']),
        ];
    }
}
