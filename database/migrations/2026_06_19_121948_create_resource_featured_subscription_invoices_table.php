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
        Schema::create('resource_featured_subscription_invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resource_featured_subscription_id');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('stripe_invoice_id')->nullable()->unique('rfsi_stripe_inv_uk');
            $table->unsignedInteger('amount_paid_cents')->default(0);
            $table->string('currency', 10)->default('usd');
            $table->string('status', 30)->nullable();
            $table->timestamp('period_start')->nullable();
            $table->timestamp('period_end')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->text('hosted_invoice_url')->nullable();
            $table->text('invoice_pdf')->nullable();
            $table->timestamps();

            $table->foreign('resource_featured_subscription_id', 'rfsi_sub_fk')
                ->references('id')
                ->on('resource_featured_subscriptions')
                ->cascadeOnDelete();

            $table->foreign('company_id', 'rfsi_company_fk')
                ->references('id')
                ->on('companies')
                ->nullOnDelete();

            $table->index(['company_id', 'paid_at'], 'rfsi_comp_paid_idx');
            $table->index(['status', 'paid_at'], 'rfsi_status_paid_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resource_featured_subscription_invoices');
    }
};
