<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseOtherAttrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_other_attr', function (Blueprint $table) {
            $table->id();
            $table->foreign('attr_cat_id')->references('id')->on('house_other_attr_cat');
            $table->foreign('house_id')->references('id')->on('cottage_house');
            $table->string('value',191)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('house_other_attr');
    }
}
