<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCottageHouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cottage_house', function (Blueprint $table) {
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

        Schema::table('cottage_house', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cottage_house');
    }
}
