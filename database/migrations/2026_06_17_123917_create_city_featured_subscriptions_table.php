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
        Schema::create('city_featured_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_featured_slot_id');
            $table->unsignedBigInteger('city_page_id');
            $table->unsignedBigInteger('company_id')->nullable();

            $table->string('billing_cycle', 20)->default('monthly'); // monthly/yearly
            $table->unsignedInteger('price_cents')->default(0);
            $table->unsignedTinyInteger('discount_percent')->default(0);
            $table->string('status', 30)->default('pending'); // pending/active/past_due/canceled/failed

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

            $table->foreign('city_featured_slot_id', 'cfsub_slot_fk')
                ->references('id')
                ->on('city_featured_slots')
                ->cascadeOnDelete();

            $table->foreign('city_page_id', 'cfsub_city_fk')
                ->references('id')
                ->on('city_pages')
                ->cascadeOnDelete();

            $table->foreign('company_id', 'cfsub_company_fk')
                ->references('id')
                ->on('companies')
                ->nullOnDelete();

            $table->index(['city_featured_slot_id', 'status', 'ends_at'], 'cfsub_slot_status_end_idx');
            $table->index(['company_id', 'status'], 'cfsub_company_status_idx');
            $table->index('stripe_subscription_id', 'cfsub_stripe_sub_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_featured_subscriptions');
    }
};
