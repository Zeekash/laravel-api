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
        Schema::create('state_route_featured_subscription_invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('state_route_featured_subscription_id');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('stripe_invoice_id')->nullable();
            $table->unsignedInteger('amount_paid_cents')->default(0);
            $table->string('currency', 10)->default('usd');
            $table->string('status', 40)->nullable();
            $table->timestamp('period_start')->nullable();
            $table->timestamp('period_end')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->text('hosted_invoice_url')->nullable();
            $table->text('invoice_pdf')->nullable();
            $table->timestamps();

            $table->foreign('state_route_featured_subscription_id', 'srf_inv_sub_fk')
                ->references('id')->on('state_route_featured_subscriptions')->cascadeOnDelete();
            $table->foreign('company_id', 'srf_inv_company_fk')
                ->references('id')->on('companies')->nullOnDelete();

            $table->unique('stripe_invoice_id', 'srf_inv_stripe_invoice_uk');
            $table->index(['company_id', 'status', 'paid_at'], 'srf_inv_company_status_paid_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('state_route_featured_subscription_invoices');
    }
};
