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
        Schema::create('resource_page_faqs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resource_page_id')->nullable();
            $table->foreign('resource_page_id')->references('id')->on('resource_pages')->onDelete('cascade');
            $table->string('question');
            $table->string('answer');
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
        Schema::dropIfExists('resource_page_faqs');
    }
};
