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
    public function up(): void
    {
        Schema::create('state_featured_slots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('state_id')->constrained('states')->cascadeOnDelete();
            $table->unsignedTinyInteger('slot_number'); // 1, 2, 3
            $table->string('label')->nullable(); // Standard slot, Top slot, etc.
            $table->unsignedInteger('monthly_price_cents')->default(0);
            $table->unsignedInteger('yearly_price_cents')->default(0);
            $table->unsignedTinyInteger('yearly_discount_percent')->default(0);
            $table->json('perks')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(['state_id', 'slot_number']);
            $table->index(['state_id', 'is_active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('state_featured_slots');
    }
};
