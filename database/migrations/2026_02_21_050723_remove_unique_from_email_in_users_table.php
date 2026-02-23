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
        Schema::table('users', function (Blueprint $table) {
            // Drop foreign key first so we can drop the unique index
            $table->dropForeign(['country_id']);
            
            // Drop unique indexes
            
            $table->dropUnique(['email']);
            $table->dropUnique(['country_id']);

            // Re-add foreign key (this will create a standard non-unique index)
            //$table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

        });
    }
};
