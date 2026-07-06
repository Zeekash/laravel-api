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
        Schema::create('resource_featured_slots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resource_page_id');
            $table->unsignedTinyInteger('slot_number');
            $table->string('label')->nullable();
            $table->unsignedInteger('monthly_price_cents')->default(29900);
            $table->unsignedInteger('yearly_price_cents')->default(299000);
            $table->unsignedTinyInteger('yearly_discount_percent')->default(17);
            $table->json('perks')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();

            $table->foreign('resource_page_id', 'rfs_resource_fk')
                ->references('id')
                ->on('resource_pages')
                ->cascadeOnDelete();

            $table->unique(['resource_page_id', 'slot_number'], 'rfs_res_slot_uk');
            $table->index(['resource_page_id', 'is_active'], 'rfs_res_active_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resource_featured_slots');
    }
};
