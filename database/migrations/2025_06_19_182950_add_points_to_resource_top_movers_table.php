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
        Schema::table('resource_top_movers', function (Blueprint $table) {
            $table->string('point_one')->nullable();
            $table->string('point_two')->nullable();
            $table->string('point_three')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resource_top_movers', function (Blueprint $table) {
            //
        });
    }
};
