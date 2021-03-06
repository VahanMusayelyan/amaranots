<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseAttr extends Model
{
    use HasFactory;

    protected $table = "house_attr";

    protected $fillable = [
        'room_id',
        'name',
        'ordering',
        'value_name',
        'valueable'
    ];


    public function allAttrTrans()
    {
        return $this->hasMany(HouseAttrTrans::class, "attr_id")->withoutGlobalScopes()->orderBy("lang","asc");
    }

    public function attrTrans()
    {
        return $this->hasOne(HouseAttrTrans::class, "attr_id");
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
