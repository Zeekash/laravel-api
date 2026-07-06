<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_life_styles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_page_id');
            $table->foreign('city_page_id')->references('id')->on('city_pages')->onDelete('cascade');
            $table->string('population')->nullable();
            $table->string('crime_index')->nullable();
            $table->string('summer_high')->nullable();
            $table->string('winter_low')->nullable();
            $table->string('annual_rainfall')->nullable();
            $table->string('annual_snowfall')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_life_styles');
    }
};
