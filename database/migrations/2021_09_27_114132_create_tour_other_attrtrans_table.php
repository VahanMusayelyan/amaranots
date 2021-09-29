<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourOtherAttrtransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_other_attrtrans', function (Blueprint $table) {
            $table->id();
            $table->string("lang",50);
            $table->bigInteger("attr_cat_id")->unsigned();
            $table->string("name",191)->nullable();
            $table->timestamps();
        });

        Schema::table('tour_other_attrtrans', function($table) {
            $table->foreign('attr_cat_id')->references('id')->on('tour_other_attr');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour_other_attrtrans');
    }
}
