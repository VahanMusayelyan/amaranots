<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseRoomsImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_rooms_images', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("house_room_id")->unsigned();
            $table->string('img')->nullable();
            $table->tinyInteger('main')->nullable();
            $table->timestamps();
        });

        Schema::table('house_rooms_images', function($table) {
            $table->foreign('house_room_id')->references('id')->on('cottage_house_rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('house_rooms_images');
    }
}
