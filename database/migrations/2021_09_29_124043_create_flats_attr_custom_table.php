<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlatsAttrCustomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flats_attr_custom', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("flat_id")->unsigned();
            $table->string("lang",50)->nullable();
            $table->string("name",191)->nullable();
            $table->text("notes")->nullable();
            $table->tinyInteger("paid")->nullable();
            $table->integer("price")->nullable();
            $table->timestamps();
        });

        Schema::table('flats_attr_custom', function($table) {
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
        Schema::dropIfExists('flats_attr_custom');
    }
}
