<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlatsAttrTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flats_attr_trans', function (Blueprint $table) {
            $table->id();
            $table->string("lang",50)->nullable();
            $table->bigInteger("attr_id")->unsigned();
            $table->string("name",191)->nullable();
            $table->timestamps();
        });

        Schema::table('flats_attr_trans', function($table) {
            $table->foreign("attr_id")->references("id")->on("flats_attr");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flats_attr_trans');
    }
}
