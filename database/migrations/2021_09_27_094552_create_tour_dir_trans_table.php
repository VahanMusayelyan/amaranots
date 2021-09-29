<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourDirTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_dir_trans', function (Blueprint $table) {
            $table->id();
            $table->string("lang",50);
            $table->bigInteger("tour_dir_id")->unsigned();
            $table->text("notes")->nullable();
            $table->timestamps();
        });

        Schema::table('tour_dir_trans', function($table) {
            $table->foreign('tour_dir_id')->references('id')->on('tour_directions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour_dir_trans');
    }
}
