<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCottageHouseRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cottage_house_rooms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("house_id")->unsigned();
            $table->bigInteger("room_id")->unsigned();
            $table->timestamps();
        });

        Schema::table('cottage_house_rooms', function($table) {
            $table->foreign('house_id')->references('id')->on('cottage_house');
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
        Schema::dropIfExists('cottage_house_rooms');
    }
}
