<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourDirImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_dir_images', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("tour_dir_id")->unsigned();
            $table->string("img")->nullable();
            $table->timestamps();
        });

        Schema::table('tour_dir_images', function($table) {
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
        Schema::dropIfExists('tour_dir_images');
    }
}
