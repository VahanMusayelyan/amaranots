<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseRoomsAttrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_rooms_attr', function (Blueprint $table) {
            $table->id();
            $table->foreign('house_room_id')->references('id')->on('cottage_house_rooms');
            $table->foreign('attr_id')->references('id')->on('house_attr');
            $table->string("value",191)->nullable();
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
        Schema::dropIfExists('house_rooms_attr');
    }
}
