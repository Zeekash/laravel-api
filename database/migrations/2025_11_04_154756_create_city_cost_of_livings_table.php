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
        Schema::create('city_cost_of_livings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_page_id');
            $table->foreign('city_page_id')->references('id')->on('city_pages')->onDelete('cascade');
            $table->string('avg_rent_cost')->nullable();
            $table->string('avg_home_cost')->nullable();
            $table->string('avg_income')->nullable();
            $table->string('cost_of_living_single')->nullable();
            $table->string('cost_of_living_family')->nullable();
            $table->string('unemployment_rate')->nullable();
            $table->string('avg_sales_tax')->nullable();
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
        Schema::dropIfExists('city_cost_of_livings');
    }
};
