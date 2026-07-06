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
        Schema::create('state_cost_top_movers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('state_cost_page_id');
            $table->foreign('state_cost_page_id')->references('id')->on('state_cost_pages')->onDelete('cascade');
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->string('heading')->nullable();
            $table->enum('position', range(1, 10));
            $table->enum('status', ['0','1'])->default('0');
            $table->string('point_one')->nullable();
            $table->string('point_two')->nullable();
            $table->string('point_three')->nullable();
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
        Schema::dropIfExists('state_cost_top_movers');
    }
};
