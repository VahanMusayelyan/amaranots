<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlatRoom extends Model
{
    use HasFactory;

    protected $table = "flats_rooms";

    protected $fillable = [
        'flat_id',
        'room_id'
    ];
}
