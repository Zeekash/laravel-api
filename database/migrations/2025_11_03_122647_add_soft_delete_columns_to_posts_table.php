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
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('deleted_by_id')->nullable();
            $table->foreign('deleted_by_id')->references('id')->on('admins')->onDelete('set null');
            $table->unsignedBigInteger('restored_by_id')->nullable();
            $table->foreign('restored_by_id')->references('id')->on('admins')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['deleted_by_id']);
            $table->dropColumn('deleted_by_id');
            $table->dropForeign(['restored_by_id']);
            $table->dropColumn('restored_by_id');
        });
    }
};
