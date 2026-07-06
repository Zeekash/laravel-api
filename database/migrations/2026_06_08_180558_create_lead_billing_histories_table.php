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
       Schema::create('lead_billing_histories', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->foreignId('company_id')->constrained()->onDelete('cascade');
            $blueprint->foreignId('subscription_id')
                ->constrained('company_lead_plan_subscriptions')
                ->onDelete('cascade');

            $blueprint->string('invoice_no')->unique(); // e.g., INV-2026-001
            $blueprint->integer('amount_cents'); // Store in cents (e.g., 24900)
            $blueprint->string('currency')->default('USD');
            $blueprint->string('status'); // paid, pending, failed
            $blueprint->string('payment_method')->nullable(); // stripe, manual, etc.
            $blueprint->string('stripe_invoice_id')->nullable();
            $blueprint->timestamp('paid_at')->nullable();
            $blueprint->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lead_billing_histories');
    }
};
