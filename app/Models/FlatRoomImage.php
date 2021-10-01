<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlatRoomImage extends Model
{
    use HasFactory;

    protected $table = "flats_rooms_images";

    protected $fillable = [
        'flats_room_id',
        'img',
        'main'
    ];

//$table->bigInteger("flats_room_id")->unsigned();
//$table->string('img')->nullable();
//$table->tinyInteger('main')->nullable();
}
