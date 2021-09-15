<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseOtherAttrCattransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_other_attr_cattrans', function (Blueprint $table) {
            $table->id();
            $table->string("lang",50)->nullable();
            $table->bigInteger("attr_cat_id")->unsigned();
            $table->string("name",191)->nullable();
            $table->timestamps();
        });

        Schema::table('house_other_attr_cattrans', function($table) {
            $table->foreign('attr_cat_id')->references('id')->on('house_other_attr_cat');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('house_other_attr_cattrans');
    }
}
