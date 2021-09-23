<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = "rooms";

    protected $fillable = [
        'name'
    ];

    public function roomTrans()
    {
        return $this->hasOne(RoomTrans::class);
    }

    public function roomAttr()
    {
        return $this->hasMany(HouseAttr::class, 'room_id');
    }
}
