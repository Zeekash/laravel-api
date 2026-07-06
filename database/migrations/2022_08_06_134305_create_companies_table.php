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
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('company_name');
            $table->string('email')->unique();
            $table->string('company_email')->unique();
            $table->string('slug')->unique();
            $table->string('phone_no')->unique();
            $table->string('additional_phone_no')->nullable();
            $table->string('company_website')->nullable();
            $table->string('company_reg_no')->nullable();
            $table->string('us_dot_no')->nullable();
            $table->string('icc_mc_license_no')->nullable();
            $table->string('local_license_no')->nullable();
            $table->string('about_company')->nullable();
            $table->string('company_address')->nullable();
            $table->string('street')->nullable();
            $table->string('image')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->unsignedBigInteger('state_id')->nullable();
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->text('company_ip');
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->boolean('allow')->nullable();
            $table->boolean('is_claimed')->default(0);
            $table->boolean('local_mover')->default(0);
            $table->boolean('long_distance_mover')->default(0);
            $table->boolean('is_featured')->default(0);
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
        Schema::dropIfExists('companies');
    }
};
