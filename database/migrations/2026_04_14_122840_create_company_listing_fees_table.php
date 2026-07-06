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
        Schema::create('company_listing_fees', function (Blueprint $table) {
           $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();

            $table->string('provider')->default('stripe');
            $table->string('type')->default('listing_fee'); // one-time fee
            $table->unsignedInteger('amount_cents');
            $table->string('currency', 10);

            $table->string('status')->default('pending'); // pending|paid|failed
            $table->string('stripe_checkout_session_id')->nullable()->index();
            $table->string('stripe_payment_intent_id')->nullable()->index();

            $table->json('meta')->nullable();
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
        Schema::dropIfExists('company_listing_fees');
    }
};
