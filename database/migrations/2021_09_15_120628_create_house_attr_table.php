<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseAttrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_attr', function (Blueprint $table) {
            $table->id();
            $table->foreign("room_id")->references('id')->on('rooms');
            $table->string("name",191)->nullable();
            $table->string("ordering",191)->nullable();
            $table->tinyInteger("valuable")->nullable();
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
        Schema::dropIfExists('house_attr');
    }
}
