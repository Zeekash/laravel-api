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
        Schema::create('best_state_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->longText('local_mover_content')->nullable();
            $table->longText('compare_mover_content')->nullable();
            $table->longText('long_distance_mover_content')->nullable();
            $table->longText('container_mover_content')->nullable();
            $table->longText('truck_rental_mover_content')->nullable();
            $table->longText('bottom_content')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('best_state_pages');
    }
};
