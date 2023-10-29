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
        Schema::create('forecasts', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('temperature_celsius');
            $table->integer('fl_temperature_celsius');
            $table->integer('pressure');
            $table->integer('humidity');
            $table->integer('wind_speed');
            $table->integer('wind_deg');
            $table->integer('cloudiness');
            $table->string('icon', 255);
            $table->foreignId('location_id');
            $table->foreign('location_id')
                ->references('id')
                ->on('locations')
                ->onDelete('cascade')
            ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forecasts');
    }
};
