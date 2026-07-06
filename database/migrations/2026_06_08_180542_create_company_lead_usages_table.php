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
        Schema::create('company_lead_usages', function (Blueprint $table) {
           $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->foreignId('lead_subscription_plan_id')->constrained();
            $table->integer('leads_allowed');
            $table->integer('leads_used')->default(0);
            $table->date('period_start');
            $table->date('period_end');
            $table->timestamps();
        
            $table->unique(['company_id', 'period_start', 'period_end']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_lead_usages');
    }
};
