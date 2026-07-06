<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('city_avg_costs', function (Blueprint $table) {
            $table->id();
            $table->string('avg_cost')->nullable();
            $table->string('cost_hour')->nullable();
            $table->unsignedBigInteger('city_page_id');

            // Foreign key constraint
            $table->foreign('city_page_id')
                  ->references('id')
                  ->on('city_pages')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('city_avg_costs');
    }
};
