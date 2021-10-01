<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlatsOtherAttrCatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flats_other_attr_cat', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("parent_id")->nullable();
            $table->string("type")->nullable();
            $table->string("value")->nullable();
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
        Schema::dropIfExists('flats_other_attr_cat');
    }
}
