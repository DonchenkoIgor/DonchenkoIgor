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
        Schema::create('animal_care', function (Blueprint $table) {
            $table->bigIncrements('animal_care_id');
            $table->unsignedBigInteger('animal_id');
            $table->unsignedBigInteger('employee_id');
        });
        Schema::table('animal_care', function (Blueprint $table){
            $table->foreign('animal_id')->references('animal_id')->on('animals');
            $table->foreign('employee_id')->references('employee_id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animal_care');
    }
};
