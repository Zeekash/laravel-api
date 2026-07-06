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
        Schema::create('state_featured_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('state_featured_slot_id')->constrained('state_featured_slots')->cascadeOnDelete();
            $table->foreignId('state_id')->constrained('states')->cascadeOnDelete();

            // Adjust constrained('companies') if your company table name is different.
            $table->foreignId('company_id')->nullable()->constrained('companies')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();

            $table->enum('billing_cycle', ['monthly', 'yearly']);
            $table->unsignedInteger('price_cents')->default(0);
            $table->unsignedTinyInteger('discount_percent')->default(0);
            $table->enum('status', ['pending', 'active', 'past_due', 'canceled', 'expired', 'failed'])->default('pending');

            // Slot is temporarily held while company is on Stripe checkout.
            $table->timestamp('reserved_until')->nullable();

            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->boolean('cancel_at_period_end')->default(false);

            $table->string('stripe_customer_id')->nullable();
            $table->string('stripe_subscription_id')->nullable()->index();
            $table->string('stripe_checkout_session_id')->nullable()->index();
            $table->string('stripe_product_id')->nullable();
            $table->string('stripe_price_id')->nullable();

            $table->timestamps();

            $table->index(
                ['state_featured_slot_id', 'status', 'reserved_until'],
                'sfs_sub_slot_status_res_idx'
            );
            $table->index(['company_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('state_featured_subscriptions');
    }
};
