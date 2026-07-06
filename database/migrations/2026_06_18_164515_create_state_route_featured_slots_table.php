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
        Schema::create('state_route_featured_slots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from_state_id');
            $table->unsignedBigInteger('to_state_id');
            $table->unsignedTinyInteger('slot_number');
            $table->string('label')->nullable();
            $table->unsignedInteger('monthly_price_cents')->default(0);
            $table->unsignedInteger('yearly_price_cents')->default(0);
            $table->unsignedTinyInteger('yearly_discount_percent')->default(0);
            $table->json('perks')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->foreign('from_state_id', 'srf_slots_from_state_fk')
                ->references('id')->on('states')->cascadeOnDelete();
            $table->foreign('to_state_id', 'srf_slots_to_state_fk')
                ->references('id')->on('states')->cascadeOnDelete();

            $table->unique(['from_state_id', 'to_state_id', 'slot_number'], 'srf_slots_route_slot_uk');
            $table->index(['from_state_id', 'to_state_id'], 'srf_slots_route_idx');
            $table->index(['is_active', 'slot_number'], 'srf_slots_active_slot_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('state_route_featured_slots');
    }
};
