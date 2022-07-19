<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_post', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id')->comment('投稿ID');
            $table->foreign('post_id')->references('id')->on('posts')->index('post_id')->onDelete('cascade');
            $table->unsignedBigInteger('category_id')->comment('カテゴリーID');
            $table->foreign('category_id')->references('id')->on('categories')->index('category_id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_post', function (Blueprint  $table) {
            $table->dropForeign('category_id');
            $table->dropForeign('post_id');
            $table->dropIfExists('post_category');
        });
    }
}
