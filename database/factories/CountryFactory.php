<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Country;
use Faker\Generator as Faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'name' => $this->faker->country,
            'code' => $this->faker->countryCode,
            'currency' => $this->faker->currencyCode,
            'currency_symbol' => $this->faker->randomElement(['$', '€', '£', '¥']),

            
        ];
    }
}
