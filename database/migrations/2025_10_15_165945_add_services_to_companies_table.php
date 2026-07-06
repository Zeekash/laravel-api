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
        Schema::table('companies', function (Blueprint $table) {

            $table->string('trucks')->nullable();
            $table->string('founding_year')->nullable();
            $table->boolean('residential_moving')->default(0);
            $table->boolean('commercial_office_moving')->default(0);
            $table->boolean('packing_unpacking_services')->default(0);
            $table->boolean('storage_services')->default(0);
            $table->boolean('international_moving')->default(0);
            $table->boolean('specialty_moving')->default(0);
            $table->boolean('labor_only_moving')->default(0);
            $table->boolean('truck_rental')->default(0);
            $table->boolean('containers_moving')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            //
        });
    }
};
