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
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->unsignedBigInteger('post_category_id')->nullable();
            $table->foreign('post_category_id')->references('id')->on('post_categories')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('slug')->unique();
            $table->string('meta_title');
            $table->text('meta_description');
            $table->longText('meta_keywords');
            $table->longText('body');
            $table->string('image');
            $table->string('img_alt');
            $table->boolean('is_published')->default(0);
            $table->boolean('is_featured')->default(0);

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
        Schema::dropIfExists('posts');
    }
};
