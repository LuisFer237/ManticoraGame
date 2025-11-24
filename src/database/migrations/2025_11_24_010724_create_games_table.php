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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('setup'); 
            $table->integer('city_hp')->default(15);                  
            $table->integer('manticore_hp')->default(10);
            $table->integer('manticore_distance')->nullable();

            $table->string('enemy_name')->nullable();
            $table->string('enemy_type')->nullable();
            $table->string('enemy_dimension')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
