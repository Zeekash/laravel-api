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
        Schema::create('company_lead_plan_subscriptions', function (Blueprint $table) {
              $table->id();

            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('lead_subscription_plan_id')->nullable();

            $table->string('stripe_customer_id')->nullable();
            $table->string('stripe_subscription_id')->nullable();

            $table->string('interval')->nullable(); // monthly|annual
            $table->string('status')->default('inactive'); // inactive|active|canceled|past_due|incomplete|trialing
            $table->timestamp('cancelled_at')->nullable();
            $table->boolean('cancel_at_period_end')->default(false);
            $table->timestamp('current_period_end')->nullable();
            $table->boolean('extra_leads_charged')->default(false);
            $table->timestamps();

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
        Schema::dropIfExists('company_lead_plan_subscriptions');
    }
};
