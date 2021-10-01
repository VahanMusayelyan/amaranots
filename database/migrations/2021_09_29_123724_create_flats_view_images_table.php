<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlatsViewImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flats_view_images', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("flat_id")->unsigned();
            $table->string('img')->nullable();
            $table->tinyInteger('main')->nullable();
            $table->timestamps();
        });

        Schema::table('flats_view_images', function($table) {
            $table->foreign('flat_id')->references('id')->on('flats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flats_view_images');
    }
}
