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
        Schema::table('contact_movers', function (Blueprint $table) {
            $table->string('ozip')->nullable();
            $table->string('dzip')->nullable();
            $table->string('ocity')->nullable();
            $table->string('dcity')->nullable();
            $table->string('ostate')->nullable();
            $table->string('dstate')->nullable();
            $table->string('source')->nullable();
            $table->string('label')->nullable();
            $table->boolean('is_extra_paid')->default(false);
            $table->timestamp('extra_paid_at')->nullable();
            $table->boolean('is_follow_up')->default(false);
            $table->boolean('is_bad_lead')->default(false);
            $table->boolean('is_quoted')->default(false);
            $table->boolean('quoted_charged')->default(false);
            $table->integer('quoted_charged_amount')->nullable();
            $table->timestamp('quoted_charged_at')->nullable();
            $table->boolean('is_not_booked')->default(false);
            $table->boolean('is_booked')->default(false);
            $table->boolean('booked_charged')->default(false);
            $table->integer('booked_charged_amount')->nullable();
            $table->timestamp('booked_charged_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_movers', function (Blueprint $table) {
            $table->dropColumn([
                'ozip',
                'dzip',
                'ocity',
                'dcity',
                'ostate',
                'dstate',
                'source',
                'label',
                'is_extra_paid',
                'extra_paid_at',
                'is_follow_up',
                'is_bad_lead',
                'is_quoted',
                'quoted_charged',
                'quoted_charged_amount',
                'quoted_charged_at',
                'is_not_booked',
                'is_booked',
                'booked_charged',
                'booked_charged_amount',
                'booked_charged_at',
            ]);
        });
    }
};
