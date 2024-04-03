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
        Schema::create('animal_feeding', function (Blueprint $table) {
            $table->bigIncrements('feeding_id');
            $table->unsignedBigInteger('animal_id');
            $table->unsignedBigInteger('food_id');
        });
        Schema::table('animal_feeding', function (Blueprint $table){
            $table->foreign('animal_id')->references('animal_id')->on('animals');
            $table->foreign('food_id')->references('food_id')->on('animal_food');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animal_feeding');
    }
};
