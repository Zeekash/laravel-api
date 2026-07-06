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
            $table->string('ozip')->nullable();
            $table->string('dzip')->nullable();
            $table->string('ocity')->nullable();
            $table->string('dcity')->nullable();
            $table->string('ostate')->nullable();
            $table->string('dstate')->nullable();
            $table->boolean('is_read')->default(false);
            $table->boolean('is_show')->default(false);
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
            $table->dropColumn([
                'ozip',
                'dzip',
                'ocity',
                'dcity',
                'ostate',
                'dstate',
                'is_read',
                'is_show',
            ]);
        });
    }
};
