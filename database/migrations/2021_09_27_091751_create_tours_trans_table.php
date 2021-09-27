<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours_trans', function (Blueprint $table) {
            $table->id();
            $table->string("lang",50)->nullable();
            $table->bigInteger("tour_id")->unsigned();
            $table->string("name",191)->nullable();
            $table->string("state",191)->nullable();
            $table->string("city",191)->nullable();
            $table->string("address",191)->nullable();
            $table->text("about")->nullable();
            $table->timestamps();
        });

        Schema::table('tours_trans', function($table) {
            $table->foreign('tour_id')->references('id')->on('tours');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tours_trans');
    }
}
