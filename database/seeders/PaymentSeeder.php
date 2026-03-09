<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Country;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Payment::factory()->create(
            [
                'order_id' => Order::factory(),
                'payment_method' => 'cod',
                'amount' => 100,
                'gateway_order_id' => 'COD-2022-01-01-000000',
                'country_id' => Country::factory(),
                'status' => 'pending',
            ]
        );
    }
}
