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
        Schema::table('city_to_city_routes', function (Blueprint $table) {
            // Drop existing foreign keys
            $table->dropForeign(['city_from_id']);
            $table->dropForeign(['city_to_id']);

            // Recreate them referencing city_pages
            $table->foreign('city_from_id')
                  ->references('id')
                  ->on('city_pages')
                  ->onDelete('cascade');

            $table->foreign('city_to_id')
                  ->references('id')
                  ->on('city_pages')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('city_to_city_routes', function (Blueprint $table) {
            // Rollback to the original
            $table->dropForeign(['city_from_id']);
            $table->dropForeign(['city_to_id']);

            $table->foreign('city_from_id')
                  ->references('id')
                  ->on('cities')
                  ->onDelete('cascade');

            $table->foreign('city_to_id')
                  ->references('id')
                  ->on('cities')
                  ->onDelete('cascade');
        });
    }
};
