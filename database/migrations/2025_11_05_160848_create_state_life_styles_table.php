<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('state_life_styles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->string('population')->nullable();
            $table->string('political_leaning')->nullable();
            $table->string('summer_high')->nullable();
            $table->string('winter_low')->nullable();
            $table->string('annual_rain')->nullable();
            $table->string('annual_snow')->nullable();
            $table->string('crime_index')->nullable();
            $table->string('transportation_score')->nullable();
            $table->string('walkability_score')->nullable();
            $table->string('bike_friendliness_score')->nullable();
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
        Schema::dropIfExists('state_life_styles');
    }
};
