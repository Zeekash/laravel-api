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
        Schema::table('cost_estimators', function (Blueprint $table) {
            $table->string('referrer')->nullable()->after('min_price');
            $table->string('user_ip')->nullable()->after('referrer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cost_estimators', function (Blueprint $table) {
            $table->dropColumn('referrer');
            $table->dropColumn('user_ip');
        });
    }
};
