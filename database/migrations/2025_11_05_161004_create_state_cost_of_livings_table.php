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
        Schema::create('state_cost_of_livings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->string('average_rent_cost')->nullable();
            $table->string('average_home_cost')->nullable();
            $table->string('average_income_per_capita')->nullable();
            $table->string('cost_of_living_single')->nullable();
            $table->string('cost_of_living_family_of_four')->nullable();
            $table->string('unemployment_rate')->nullable();
            $table->string('sales_tax')->nullable();
            $table->string('state_income_tax')->nullable();
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
        Schema::dropIfExists('state_cost_of_livings');
    }
};
