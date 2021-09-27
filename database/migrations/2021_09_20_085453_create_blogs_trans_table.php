<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs_trans', function (Blueprint $table) {
            $table->id();
            $table->string("lang",50)->nullable();
            $table->bigInteger("blog_id")->unsigned();
            $table->text("theme")->nullable();
            $table->text("tags")->nullable();
            $table->text("header")->nullable();
            $table->text("content_first")->nullable();
            $table->text("content_second")->nullable();
            $table->timestamps();
        });

        Schema::table('blogs_trans', function($table) {
            $table->foreign('blog_id')->references('id')->on('blogs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs_trans');
    }
}
