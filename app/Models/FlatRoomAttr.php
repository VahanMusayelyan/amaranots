<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlatRoomAttr extends Model
{
    use HasFactory;

    protected $table = "flats_room_attr";

    protected $fillable = [
        'flat_room_id',
        'attr_id',
        'value'
    ];
}
