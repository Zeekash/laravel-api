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
        Schema::create('city_living_expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_page_id');
            $table->string('basic_utilities')->nullable();
            $table->string('cell_phone_plan')->nullable();
            $table->string('dozen_eggs')->nullable();
            $table->string('loaf_of_bread')->nullable();
            $table->string('fast_food')->nullable();
            $table->string('dinner')->nullable();
            $table->string('gym_membership')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('city_page_id')->references('id')->on('city_pages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_living_expenses');
    }
};
