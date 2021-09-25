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
            $table->bigInteger("room_id")->unsigned();
            $table->string("name",191)->nullable();
            $table->string("ordering",191)->nullable();
            $table->text("value_name")->nullable();
            $table->tinyInteger("valueable")->nullable();
            $table->timestamps();
        });

        Schema::table('house_attr', function($table) {
            $table->foreign("room_id")->references('id')->on('rooms');
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
