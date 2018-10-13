<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('article');
            $table->integer('user_id')->unsigned();
            $table->integer('categoray_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('website_users');
            $table->foreign('categoray_id')->references('id')->on('categories');
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
        Schema::dropForeign(['user_id']);
        Schema::dropForeign(['categoray_id']);
        Schema::drop('articles');
    }
}
