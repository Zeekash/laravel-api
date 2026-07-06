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
        Schema::create('lead_subscription_plans', function (Blueprint $table) {
            $table->id();

            $table->string('name')->unique();                 // "Starter"
            $table->string('slug')->unique();                 // "starter"
            $table->string('description')->nullable();

            $table->unsignedInteger('leads_per_month')->default(0);
            $table->unsignedInteger('extra_lead_fee_cents')->default(0);

            $table->unsignedInteger('monthly_price_cents')->default(0);
            $table->unsignedInteger('annual_price_cents')->default(0);

            $table->string('target_audience')->nullable();
            $table->longText('included_features')->nullable(); // store as text lines

            $table->string('icon')->default('package');        // package|zap|crown|rocket
            $table->string('color')->default('gray');          // gray|blue|green|purple|amber|orange

            $table->integer('display_order')->default(0);
            $table->boolean('is_active')->default(true);

            // Stripe IDs
            $table->string('stripe_product_id')->nullable();

            $table->string('stripe_monthly_price_id')->nullable();
            $table->unsignedInteger('stripe_monthly_price_cents')->nullable();

            $table->string('stripe_annual_price_id')->nullable();
            $table->unsignedInteger('stripe_annual_price_cents')->nullable();

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
        Schema::dropIfExists('lead_subscription_plans');
    }
};
