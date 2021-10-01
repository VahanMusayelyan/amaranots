<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlatsRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flats_rooms', function (Blueprint $table) {
                $table->id();
                $table->bigInteger("flat_id")->unsigned();
                $table->bigInteger("room_id")->unsigned();
                $table->timestamps();
            });

            Schema::table('flats_rooms', function($table) {
                $table->foreign('flat_id')->references('id')->on('flats');
                $table->foreign('room_id')->references('id')->on('rooms');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flats_rooms');
    }
}
