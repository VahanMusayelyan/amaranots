<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlatsOtherAttrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flats_other_attr', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("attr_cat_id")->unsigned();
            $table->bigInteger("flat_id")->unsigned();
            $table->string('value',191)->nullable();
            $table->timestamps();
        });

        Schema::table('flats_other_attr', function($table) {
            $table->foreign('attr_cat_id')->references('id')->on('flats_other_attr_cat');
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
        Schema::dropIfExists('flats_other_attr');
    }
}
