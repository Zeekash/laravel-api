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
        Schema::table('city_life_styles', function (Blueprint $table) {
            $table->string('political_leaning')->after('annual_snowfall')->nullable();
            $table->string('transportation_score')->after('political_leaning')->nullable();
            $table->string('walkability_score')->after('transportation_score')->nullable();
            $table->string('bike_friendliness_score')->after('walkability_score')->nullable();
            $table->string('safety_index')->after('bike_friendliness_score')->nullable();
            $table->string('air_quality')->after('safety_index')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('city_life_styles', function (Blueprint $table) {
            $table->dropColumn([
                'political_leaning',
                'transportation_score',
                'walkability_score',
                'bike_friendliness_score',
                'safety_index',
                'air_quality',
            ]);
        });
    }
};
