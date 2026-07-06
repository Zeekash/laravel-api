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
        Schema::table('state_to_city_routes', function (Blueprint $table) {
            // Drop existing foreign key constraints
            $table->dropForeign(['create_by_id']);
            $table->dropForeign(['deleted_by_id']);

            // Re-add foreign key relationships referencing 'admins'
            $table->foreign('create_by_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('state_to_city_routes', function (Blueprint $table) {
            // Drop admin foreign keys
            $table->dropForeign(['create_by_id']);
            $table->dropForeign(['deleted_by_id']);

            // Re-add old user foreign keys
            $table->foreign('create_by_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
};
