<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseRoomsImages extends Model
{
    use HasFactory;

    protected $table = "house_rooms_images";

    protected $fillable = [
        'house_room_id',
        'img',
        'main'
    ];
}
