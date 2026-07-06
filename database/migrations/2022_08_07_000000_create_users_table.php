<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->timestamp('email_verified_at');
            $table->string('overall_rating');
            $table->string('review_subject');
            $table->longText('your_review');
            $table->string('service_cost');
            $table->string('currency');
            $table->string('move_type');
            $table->string('move_size');
            $table->string('quote')->nullable();
            $table->unsignedBigInteger('pick_up_country_id');
            $table->foreign('pick_up_country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->unsignedBigInteger('pick_up_state_id');
            $table->foreign('pick_up_state_id')->references('id')->on('states')->onDelete('cascade');
            $table->unsignedBigInteger('pick_up_city_id');
            $table->foreign('pick_up_city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->unsignedBigInteger('delivery_country_id');
            $table->foreign('delivery_country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->unsignedBigInteger('delivery_state_id');
            $table->foreign('delivery_state_id')->references('id')->on('states')->onDelete('cascade');
            $table->unsignedBigInteger('delivery_city_id');
            $table->foreign('delivery_city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->text('client_ip');
            $table->longText('respond')->nullable();
            $table->boolean('allow')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('image5')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
