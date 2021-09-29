<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourOtherAttrcatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_other_attrcat', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("attr_cat_id")->unsigned();
            $table->bigInteger("tour_dir_id")->unsigned();
            $table->string("value",191)->nullable();
            $table->timestamps();
        });

        Schema::table('tour_other_attrcat', function($table) {
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
        Schema::dropIfExists('tour_other_attrcat');
    }
}
