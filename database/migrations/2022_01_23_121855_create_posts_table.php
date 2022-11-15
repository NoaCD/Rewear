<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->string('slug');
            $table->longText('extract');
            $table->longText('body');
            $table->string('title_en');
            $table->string('subtitle_en');
            $table->string('slug_en');
            $table->longText('extract_en');
            $table->longText('body_en');
            $table->unsignedBigInteger('post_category_id');
            $table->foreign('post_category_id')->references('id')->on('post_categories');
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
}
