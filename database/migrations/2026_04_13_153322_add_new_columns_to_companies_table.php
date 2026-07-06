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
        Schema::table('companies', function (Blueprint $table) {
            $table->enum('listing_fee_status', ['pending', 'paid', 'waived'])->default('pending')->index();
            $table->timestamp('listing_fee_paid_at')->nullable();
            $table->timestamp('listing_fee_waived_at')->nullable();

            $table->timestamp('trial_ends_at')->nullable()->index(); // 7-day trial
            $table->foreignId('waiver_code_id')->nullable()->constrained('waiver_codes')->nullOnDelete();
            $table->integer('discount_cents')->default(0);
            $table->string('stripe_customer_id')->nullable()->index()->after('id');
            $table->string('stripe_payment_method_id')->nullable()->after('stripe_customer_id');
            
            $table->string('yelp_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('service_distance')->nullable();
            $table->string('local_service_radius')->nullable();
            $table->unsignedBigInteger('head_office')->nullable();
            $table->foreign('head_office')->references('id')->on('states')->onDelete('set null');
            $table->string('insurance_provider')->nullable();
            $table->string('liablity_policy')->nullable();
            $table->string('cargo_policy')->nullable();
            $table->string('workers_comp_policy')->nullable();
            $table->string('insurance_expiry_date')->nullable();
            $table->string('cerficate_of_insurance')->nullable();
            $table->string('plain_password')->after('password')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropConstrainedForeignId('waiver_code_id');
            $table->dropColumn([
                'yelp_link',
                'linkedin_link',
                'youtube_link',
                'service_distance',
                'local_service_radius',
                'head_office',
                'insurance_provider',
                'liablity_policy',
                'cargo_policy',
                'workers_comp_policy',
                'insurance_expiry_date',
                'cerficate_of_insurance',
                'listing_fee_status',
                'listing_fee_paid_at',
                'listing_fee_waived_at',
                'trial_ends_at',
                'stripe_customer_id',
                'discount_cents',
                'stripe_payment_method_id',
                'plain_password',
                
            ]);
        });
    }
};