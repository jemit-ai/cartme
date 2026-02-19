<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate first to avoid duplicates
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Currency::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $currencies = [
            [
                'code' => 'USD',
                'rate' => 1.00000000,
                'is_base' => true,
            ],
            [
                'code' => 'EUR',
                'rate' => 0.92000000,
                'is_base' => false,
            ],
            [
                'code' => 'GBP',
                'rate' => 0.79000000,
                'is_base' => false,
            ],
            [
                'code' => 'INR',
                'rate' => 83.00000000,
                'is_base' => false,
            ],
            [
                'code' => 'JPY',
                'rate' => 150.00000000,
                'is_base' => false,
            ],
        ];

        foreach ($currencies as $currency) {
            Currency::create($currency);
        }

        $this->command->info('Currencies seeded successfully!');
    }
}
