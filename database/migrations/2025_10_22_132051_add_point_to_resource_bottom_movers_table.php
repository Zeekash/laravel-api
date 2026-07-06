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
        Schema::table('resource_bottom_movers', function (Blueprint $table) {
            $table->string('point_one')->nullable()->after('heading');
            $table->string('point_two')->nullable()->after('point_one');
            $table->string('point_three')->nullable()->after('point_two');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resource_bottom_movers', function (Blueprint $table) {
            $table->dropColumn('point_one');
            $table->dropColumn('point_two');
            $table->dropColumn('point_three');
        });
    }
};
