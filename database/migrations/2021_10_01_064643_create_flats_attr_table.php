<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlatsAttrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flats_attr', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("room_id")->unsigned();
            $table->string("name",191)->nullable();
            $table->string("ordering",191)->nullable();
            $table->timestamps();
        });

        Schema::table('flats_attr', function($table) {
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
        Schema::dropIfExists('flats_attr');
    }
}
