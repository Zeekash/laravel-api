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
            $table->dropForeign(['create_by_id']);
            $table->dropForeign(['deleted_by_id']);

            $table->foreign('create_by_id')->references('id')->on('admins')->onDelete('set null');
            $table->foreign('deleted_by_id')->references('id')->on('admins')->onDelete('set null');
        });

        Schema::table('state_to_city_routes', function (Blueprint $table) {
            $table->dropForeign(['create_by_id']);
            $table->dropForeign(['deleted_by_id']);

            $table->foreign('create_by_id')->references('id')->on('admins')->onDelete('set null');
            $table->foreign('deleted_by_id')->references('id')->on('admins')->onDelete('set null');
        });

        Schema::table('city_to_state_routes', function (Blueprint $table) {
            $table->dropForeign(['create_by_id']);
            $table->dropForeign(['deleted_by_id']);

            $table->foreign('create_by_id')->references('id')->on('admins')->onDelete('set null');
            $table->foreign('deleted_by_id')->references('id')->on('admins')->onDelete('set null');
        });

        Schema::table('city_to_city_routes', function (Blueprint $table) {
            $table->dropForeign(['create_by_id']);
            $table->dropForeign(['deleted_by_id']);

            $table->foreign('create_by_id')->references('id')->on('admins')->onDelete('set null');
            $table->foreign('deleted_by_id')->references('id')->on('admins')->onDelete('set null');
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
            $table->dropForeign(['create_by_id']);
            $table->dropForeign(['deleted_by_id']);
            $table->foreign('create_by_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('admins')->onDelete('cascade');
        });
        Schema::table('state_to_city_routes', function (Blueprint $table) {
            $table->dropForeign(['create_by_id']);
            $table->dropForeign(['deleted_by_id']);
            $table->foreign('create_by_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('admins')->onDelete('cascade');
        });
        Schema::table('city_to_state_routes', function (Blueprint $table) {
            $table->dropForeign(['create_by_id']);
            $table->dropForeign(['deleted_by_id']);
            $table->foreign('create_by_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('admins')->onDelete('cascade');
        });
        Schema::table('city_to_city_routes', function (Blueprint $table) {
            $table->dropForeign(['create_by_id']);
            $table->dropForeign(['deleted_by_id']);
            $table->foreign('create_by_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }
};
