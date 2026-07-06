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
        Schema::create('city_featured_slots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_page_id');
            $table->unsignedTinyInteger('slot_number');
            $table->string('label')->nullable();
            $table->unsignedInteger('monthly_price_cents')->default(29900);
            $table->unsignedInteger('yearly_price_cents')->default(299000);
            $table->unsignedTinyInteger('yearly_discount_percent')->default(17);
            $table->json('perks')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();

            $table->foreign('city_page_id', 'cfs_city_fk')
                ->references('id')
                ->on('city_pages')
                ->cascadeOnDelete();

            $table->unique(['city_page_id', 'slot_number'], 'cfs_city_slot_unique');
            $table->index(['city_page_id', 'is_active'], 'cfs_city_active_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_featured_slots');
    }
};
