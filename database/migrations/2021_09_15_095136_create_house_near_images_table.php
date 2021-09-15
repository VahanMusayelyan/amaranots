<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseNearImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_near_images', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("house_id")->unsigned();
            $table->string("img",191);
            $table->string("distance",191);
            $table->timestamps();
        });

        Schema::table('house_near_images', function($table) {
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
        Schema::dropIfExists('house_near_images');
    }
}
