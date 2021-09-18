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
        'valueable'
    ];

    protected $with = ['attrTrans'];

    public function attrTrans(){
        return $this->hasOne(HouseAttrTrans::class, "attr_id");
    }
}
