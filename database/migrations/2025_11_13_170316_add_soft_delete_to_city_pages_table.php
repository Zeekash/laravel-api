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
        Schema::table('city_pages', function (Blueprint $table) {
            $table->softDeletes();
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id')->references('id')->on('admins')->onDelete('set null');
            $table->unsignedBigInteger('deleted_by_id')->nullable();
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
        Schema::table('city_pages', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropForeign(['created_by_id']);
            $table->dropForeign(['deleted_by_id']);
            $table->dropColumn('created_by_id');
            $table->dropColumn('deleted_by_id');
        });
    }
};
