<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlatsRoomsImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flats_rooms_images', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("flats_room_id")->unsigned();
            $table->string('img')->nullable();
            $table->tinyInteger('main')->nullable();
            $table->timestamps();
        });

        Schema::table('flats_rooms_images', function($table) {
            $table->foreign('flats_room_id')->references('id')->on('flats_rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flats_rooms_images');
    }
}
