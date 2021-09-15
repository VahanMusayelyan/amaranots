<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomTrans extends Model
{
    use HasFactory;

    protected $table = "rooms_trans";

    protected $fillable = [
        'lang',
        'room_id',
        'name'
    ];
}
