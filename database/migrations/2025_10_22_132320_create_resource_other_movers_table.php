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
        Schema::create('resource_other_movers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resource_page_id')->constrained()->onDelete('cascade');
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('heading')->nullable();
            $table->string('point_one')->nullable();
            $table->string('point_two')->nullable();
            $table->string('point_three')->nullable();
            $table->longText('content')->nullable();
            $table->enum('position', range(1, 10))->nullable();
            $table->enum('status', ['0','1'])->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resource_other_movers');
    }
};
