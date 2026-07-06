<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Only stripe_product_id is stored on posts table.
     * stripe_price_id      → comes from Stripe API via product
     * stripe_subscription_id → comes from company_lead_plan_subscriptions table
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            if (! Schema::hasColumn('posts', 'stripe_product_id')) {
                $table->string('stripe_product_id')->nullable()->after('stripe_payment_intent_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            if (Schema::hasColumn('posts', 'stripe_product_id')) {
                $table->dropColumn('stripe_product_id');
            }
        });
    }
};
