<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourAttrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_attr', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("tour_dir_id")->unsigned();
            $table->bigInteger("attr_id")->unsigned();
            $table->bigInteger("value")->nullable();
            $table->timestamps();
        });

        Schema::table('tour_attr', function($table) {
            $table->foreign('tour_dir_id')->references('id')->on('tour_directions');
            $table->foreign('attr_id')->references('id')->on('tour_attr_temp');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour_attr');
    }
}
