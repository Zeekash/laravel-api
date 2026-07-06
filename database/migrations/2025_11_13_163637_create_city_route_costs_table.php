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
    public function up(): void
{
    Schema::create('city_route_costs', function (Blueprint $table) {
        $table->id();
        $table->string('route_link')->nullable();
        $table->string('route_name')->nullable();
        $table->string('route_value')->nullable();
        $table->unsignedBigInteger('city_page_id')->nullable(false);
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
        Schema::dropIfExists('city_route_costs');
    }
};
