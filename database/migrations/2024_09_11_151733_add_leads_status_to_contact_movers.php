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
    public function up(): void
    {
        Schema::table('contact_movers', function (Blueprint $table) {
            $table->boolean('is_basic')->default(0);
            $table->boolean('is_standard')->default(0);
            $table->boolean('is_golden')->default(0);
            $table->boolean('is_exclusive')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_movers', function (Blueprint $table) {
            $table->dropColumn('is_basic');
            $table->dropColumn('is_standard');
            $table->dropColumn('is_golden');
            $table->dropColumn('is_exclusive');
        });
    }
};
