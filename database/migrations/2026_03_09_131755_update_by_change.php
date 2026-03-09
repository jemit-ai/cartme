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
        Schema::table('order_tracks', function (Blueprint $table) {
            
            $table->dropForeign(['updated_by']); // remove foreign key
            $table->dropColumn('updated_by'); 

            
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('guest_token')->nullable();

            $table->index('user_id');
            $table->index('guest_token');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_tracks', function (Blueprint $table) {
            //
        });
    }
};
