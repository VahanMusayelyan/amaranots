<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlatsRoomAttrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flats_room_attr', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("flat_room_id")->unsigned();
            $table->bigInteger("attr_id")->unsigned();
            $table->string("value",191)->nullable();
            $table->timestamps();
        });

        Schema::table('flats_room_attr', function($table) {
            $table->foreign('flat_room_id')->references('id')->on('flats_rooms');
            $table->foreign('attr_id')->references('id')->on('flats_attr');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flats_room_attr');
    }
}
