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
            'iso2' => $this->faker->countryCode,
            'iso3' => $this->faker->countryISOAlpha3,
            'phone_code' => $this->faker->numerify('+##'),
            'currency' => $this->faker->currencyCode,
            'currency_symbol' => $this->faker->randomElement(['$', '€', '£', '¥']),

            
        ];
    }
}
