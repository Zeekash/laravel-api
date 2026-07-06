<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies_verify', function (Blueprint $table) {
            Schema::dropIfExists('companies_verify');
            $table->integer('company_id');
            $table->string('token');
            $table->timestamps();
        });
        Schema::table('companies', function (Blueprint $table) {
            $table->boolean('is_email_verified')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies_verify');
    }
};
