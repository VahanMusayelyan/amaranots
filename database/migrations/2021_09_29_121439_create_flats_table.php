<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id")->unsigned();
            $table->string("slug",191)->nullable();
            $table->text("coordinates")->nullable();
            $table->integer("guests")->nullable();
            $table->integer("floor")->nullable();
            $table->integer("rooms")->nullable();
            $table->float("surface")->nullable();
            $table->tinyInteger("elevator")->nullable();
            $table->string("check_in",191)->nullable();
            $table->string("check_out",191)->nullable();
            $table->bigInteger("visitors")->nullable();
            $table->timestamps();
        });

        Schema::table('flats', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flats');
    }
}
