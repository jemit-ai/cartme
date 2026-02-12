<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('billing_first_name')->after('status');
            $table->string('billing_last_name')->after('billing_first_name');
            $table->string('billing_email')->after('billing_last_name');
            $table->string('billing_phone')->after('billing_email');
            $table->text('billing_address')->after('billing_phone');
            $table->string('billing_city')->after('billing_address');
            $table->string('billing_state')->after('billing_city');
            $table->string('billing_postcode')->after('billing_state');
            $table->string('billing_country')->after('billing_postcode');
            $table->string('payment_method')->after('billing_country');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'billing_first_name',
                'billing_last_name',
                'billing_email',
                'billing_phone',
                'billing_address',
                'billing_city',
                'billing_state',
                'billing_postcode',
                'billing_country',
                'payment_method'
            ]);
        });
    }
};
