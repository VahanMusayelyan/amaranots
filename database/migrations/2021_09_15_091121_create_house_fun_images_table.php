<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseFunImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_fun_images', function (Blueprint $table) {
            $table->id();
            $table->foreign('house_room_id')->references('id')->on('cottage_house_rooms');
            $table->string('img')->nullable();
            $table->tinyInteger('main')->nullable();
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
        Schema::dropIfExists('house_fun_images');
    }
}
