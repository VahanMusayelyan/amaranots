<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id")->unsigned();
            $table->string("slug",191)->nullable();
            $table->text("coordinates")->nullable();
            $table->string("with_night",191)->nullable();
            $table->string("without_night",191)->nullable();
            $table->string("check_in",191)->nullable();
            $table->string("check_out",191)->nullable();
            $table->bigInteger("visitors")->nullable();
            $table->timestamps();
        });

        Schema::table('tours', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tours');
    }
}
