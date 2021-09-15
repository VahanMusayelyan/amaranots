<?php

use App\Models\CottageHouse;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCottageHouseTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cottage_house_trans', function (Blueprint $table) {
            $table->id();
            $table->string("lang",50)->nullable();
            $table->foreign('house_id')->references('id')->on('cottage_house');
            $table->text("name")->nullable();
            $table->string("state")->nullable();
            $table->string("city")->nullable();
            $table->text("address")->nullable();
            $table->text("notes")->nullable();
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
        Schema::dropIfExists('cottage_house_trans');
    }
}
