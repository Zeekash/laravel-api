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
        Schema::table('state_to_state_routes', function (Blueprint $table) {
            $table->softDeletes();
            $table->unsignedBigInteger('create_by_id')->nullable();
            $table->foreign('create_by_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('deleted_by_id')->nullable();
            $table->foreign('deleted_by_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('state_to_state_routes', function (Blueprint $table) {
            //
        });
    }
};
