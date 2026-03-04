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
        
            $table->string('billing_first_name')->nullable()->change();
            $table->string('billing_last_name')->nullable()->change();
            $table->string('billing_email')->nullable()->change();
            $table->string('billing_phone')->nullable()->change();
            $table->string('billing_address')->nullable()->change();
            $table->string('billing_city')->nullable()->change();
            $table->string('billing_state')->nullable()->change();
            $table->string('billing_postcode')->nullable()->change();
            $table->string('billing_country')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
