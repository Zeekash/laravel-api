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
        Schema::table('state_cost_of_livings', function (Blueprint $table) {
            $table->string('cost_of_living_index')->after('cost_of_living_single')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('state_cost_of_livings', function (Blueprint $table) {
            $table->dropColumn('cost_of_living_index');
        });
    }
};
