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
        Schema::create('defenders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained()->onDelete('cascade');

            // API Data
            $table->integer('api_id');
            $table->string('name');
            $table->string('image');

            $table->integer('gold')->default(100);
            $table->foreignId('weapon_id')->nullable()->constrained();
            $table->integer('shots_fired')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('defenders');
    }
};
