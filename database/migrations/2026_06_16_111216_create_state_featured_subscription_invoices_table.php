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
        Schema::create('state_featured_subscription_invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('state_featured_subscription_id');

$table->foreign('state_featured_subscription_id', 'sfsi_sub_fk')
    ->references('id')
    ->on('state_featured_subscriptions')
    ->cascadeOnDelete();
           $table->unsignedBigInteger('company_id')->nullable();

$table->foreign('company_id', 'sfsi_company_fk')
    ->references('id')
    ->on('companies')
    ->nullOnDelete();
            $table->string('stripe_invoice_id')->nullable()->unique();
            $table->unsignedInteger('amount_paid_cents')->default(0);
            $table->string('currency', 10)->default('usd');
            $table->string('status')->nullable();
            $table->timestamp('period_start')->nullable();
            $table->timestamp('period_end')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->text('hosted_invoice_url')->nullable();
            $table->text('invoice_pdf')->nullable();
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
        Schema::dropIfExists('state_featured_subscription_invoices');
    }
};
