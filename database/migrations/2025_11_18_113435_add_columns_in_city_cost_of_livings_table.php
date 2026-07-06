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
        Schema::table('city_cost_of_livings', function (Blueprint $table) {
            $table->string('cost_of_living_index')->after('cost_of_living_single')->nullable();
            $table->string('state_income_tax')->after('avg_sales_tax')->nullable();
            $table->string('avg_1_br_rent')->after('state_income_tax')->nullable();
            $table->string('avg_3_br_rent')->after('avg_1_br_rent')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('city_cost_of_livings', function (Blueprint $table) {
            $table->dropColumn([
                'cost_of_living_index',
                'state_income_tax',
                'avg_1_br_rent',
                'avg_3_br_rent'
            ]);
        });
    }
};
