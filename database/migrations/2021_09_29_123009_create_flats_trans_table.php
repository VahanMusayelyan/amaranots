<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlatsTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flats_trans', function (Blueprint $table) {
            $table->id();
            $table->string("lang",50)->nullable();
            $table->bigInteger("flat_id")->unsigned();
            $table->text("name")->nullable();
            $table->string("state")->nullable();
            $table->string("city")->nullable();
            $table->text("address")->nullable();
            $table->timestamps();
        });

        Schema::table('flats_trans', function($table) {
            $table->foreign('flat_id')->references('id')->on('flats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flats_trans');
    }
}
