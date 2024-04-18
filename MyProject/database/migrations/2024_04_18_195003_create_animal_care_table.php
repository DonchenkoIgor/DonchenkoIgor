<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('animal_care', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('animal_id');
            $table->unsignedBigInteger('employees_id');

            $table->foreign('animal_id')->references('id')->on('animals');
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
