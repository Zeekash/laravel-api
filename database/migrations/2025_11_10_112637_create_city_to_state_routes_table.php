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
        Schema::create('city_to_state_routes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('miles')->nullable();
            $table->string('min_cost')->nullable();
            $table->string('max_cost')->nullable();
            $table->longText('upper_content')->nullable();
            $table->longText('middle_content')->nullable();
            $table->longText('bottom_content')->nullable();

            $table->unsignedBigInteger('city_from_id');
            $table->foreign('city_from_id')->references('id')->on('city_pages')->onDelete('cascade');
            $table->unsignedBigInteger('state_to_id');
            $table->foreign('state_to_id')->references('id')->on('states')->onDelete('cascade');

            $table->softDeletes();
            $table->unsignedBigInteger('create_by_id')->nullable();
            $table->foreign('create_by_id')->references('id')->on('admins')->onDelete('cascade');
            $table->unsignedBigInteger('deleted_by_id')->nullable();
            $table->foreign('deleted_by_id')->references('id')->on('admins')->onDelete('cascade');
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
        Schema::dropIfExists('city_to_state_routes');
    }
};
