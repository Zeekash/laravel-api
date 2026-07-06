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
        Schema::create('state_cost_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('slug')->unique();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->longText('local_moving_company_cost')->nullable();
            $table->longText('interstate_moving_company_cost')->nullable();
            $table->longText('moving_containers_cost')->nullable();
            $table->longText('cost_to_rent_moving_truck')->nullable();
            $table->longText('factors_that_affect_the_cost')->nullable();
            $table->longText('simple_ways_to_save_money')->nullable();
            $table->longText('cheapest_way_to_move')->nullable();
            $table->longText('most_accurate_moving_quote')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
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
        Schema::dropIfExists('state_cost_pages');
    }
};
