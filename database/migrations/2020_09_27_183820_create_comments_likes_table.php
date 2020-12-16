<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments_likes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comment_id');
            // $table->integer('article_id');
            // $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
            $table->integer('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('comments_likes');
    }
}
