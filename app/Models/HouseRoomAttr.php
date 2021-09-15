<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseRoomAttr extends Model
{
    use HasFactory;

    protected $table = "house_fun_images";

    protected $fillable = [
        'house_room_id',
        'attr_id',
        'value'
    ];
}
