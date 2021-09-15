<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseAttrTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_attr_trans', function (Blueprint $table) {
            $table->id();
            $table->string("lang",50)->nullable();
            $table->bigInteger("attr_id")->unsigned();
            $table->string("name",191)->nullable();
            $table->timestamps();
        });

        Schema::table('house_attr_trans', function($table) {
            $table->foreign("attr_id")->references("id")->on("house_attr");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('house_attr_trans');
    }
}
