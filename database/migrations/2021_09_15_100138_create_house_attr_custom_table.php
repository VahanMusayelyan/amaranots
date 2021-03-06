<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseAttrCustomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_attr_custom', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("house_id")->unsigned();
            $table->string("lang",50)->nullable();
            $table->string("name",191)->nullable();
            $table->text("notes")->nullable();
            $table->tinyInteger("paid")->nullable();
            $table->integer("price")->nullable();
            $table->timestamps();
        });

        Schema::table('house_attr_custom', function($table) {
            $table->foreign('house_id')->references('id')->on('cottage_house');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('house_attr_custom');
    }
}
