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
        Schema::table('resource_pages', function (Blueprint $table) {

            $table->text('full_service_content')->nullable()->after('meta_description');
            $table->text('other_service_content')->nullable()->after('full_service_content');
            $table->longText('middle_content')->nullable()->after('upper_content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resource_pages', function (Blueprint $table) {
            $table->dropColumn('full_service_content');
            $table->dropColumn('other_service_content');
            $table->dropColumn('middle_content');
        });
    }
};
