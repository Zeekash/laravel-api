<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_calculates', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity')->nullable();
            $table->integer('cubic_feet');
            $table->integer('result')->nullable();
            $table->unsignedBigInteger('item_id')->nullable();
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->unsignedBigInteger('get_quotation_id')->nullable();
            $table->foreign('get_quotation_id')->references('id')->on('get_quotations')->onDelete('cascade');
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
        Schema::dropIfExists('item_calculates');
    }
};
