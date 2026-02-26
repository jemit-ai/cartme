<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
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
           'guest_token' => '', 
           'address_line_1' => $this->faker->address,
           'address_line_2' => $this->faker->address,
           'city' => $this->faker->city,
           'state' => $this->faker->state,
           'postal_code' => $this->faker->postcode,
           'country' => $this->faker->country,
           'phone' => $this->faker->phoneNumber,
           'is_default' => $this->faker->boolean,
        ];
    }
}
