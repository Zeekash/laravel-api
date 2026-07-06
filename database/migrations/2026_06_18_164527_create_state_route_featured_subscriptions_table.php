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
        Schema::create('state_route_featured_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('state_route_featured_slot_id');
            $table->unsignedBigInteger('from_state_id');
            $table->unsignedBigInteger('to_state_id');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('billing_cycle', 20)->default('monthly');
            $table->unsignedInteger('price_cents')->default(0);
            $table->unsignedTinyInteger('discount_percent')->default(0);
            $table->string('status', 40)->default('pending');
            $table->timestamp('reserved_until')->nullable();
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->boolean('cancel_at_period_end')->default(false);
            $table->timestamp('canceled_at')->nullable();
            $table->string('stripe_customer_id')->nullable();
            $table->string('stripe_subscription_id')->nullable();
            $table->string('stripe_product_id')->nullable();
            $table->string('stripe_price_id')->nullable();
            $table->string('stripe_latest_invoice_id')->nullable();
            $table->timestamps();

            $table->foreign('state_route_featured_slot_id', 'srf_sub_slot_fk')
                ->references('id')->on('state_route_featured_slots')->cascadeOnDelete();
            $table->foreign('from_state_id', 'srf_sub_from_state_fk')
                ->references('id')->on('states')->cascadeOnDelete();
            $table->foreign('to_state_id', 'srf_sub_to_state_fk')
                ->references('id')->on('states')->cascadeOnDelete();
            $table->foreign('company_id', 'srf_sub_company_fk')
                ->references('id')->on('companies')->nullOnDelete();

            $table->index(['state_route_featured_slot_id', 'status', 'reserved_until'], 'srf_sub_slot_status_res_idx');
            $table->index(['state_route_featured_slot_id', 'status', 'ends_at'], 'srf_sub_slot_status_end_idx');
            $table->index(['from_state_id', 'to_state_id'], 'srf_sub_route_idx');
            $table->index(['company_id', 'status'], 'srf_sub_company_status_idx');
            $table->index('stripe_subscription_id', 'srf_sub_stripe_sub_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('state_route_featured_subscriptions');
    }
};
