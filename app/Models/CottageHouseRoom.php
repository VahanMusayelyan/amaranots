<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CottageHouseRoom extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = "cottage_house_rooms";

    protected $fillable = [
        'house_id',
        'room_id'
    ];
}
