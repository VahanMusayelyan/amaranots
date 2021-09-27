<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourOtherAttrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_other_attr', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->integer("parent_id")->nullable();
            $table->string("type",100)->nullable();
            $table->string("value",191)->nullable();
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
        Schema::dropIfExists('tour_other_attr');
    }
}
