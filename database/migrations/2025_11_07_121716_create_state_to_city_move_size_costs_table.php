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
        Schema::create('state_to_city_move_size_costs', function (Blueprint $table) {
            $table->id();
            $table->string('moving_company_studio_bedroom')->nullable();
            $table->string('moving_container_studio_bedroom')->nullable();
            $table->string('rental_truck_studio_bedroom')->nullable();
            $table->string('moving_company_2_3_bedroom')->nullable();
            $table->string('moving_container_2_3_bedroom')->nullable();
            $table->string('rental_truck_2_3_bedroom')->nullable();
            $table->string('moving_company_4_bedroom')->nullable();
            $table->string('moving_container_4_bedroom')->nullable();
            $table->string('rental_truck_4_bedroom')->nullable();
            $table->unsignedBigInteger('state_to_city_route_id');
             $table->foreign('state_to_city_route_id')->references('id')->on('state_to_city_routes')->onDelete('cascade');
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
        Schema::dropIfExists('state_to_city_move_size_costs');
    }
};
