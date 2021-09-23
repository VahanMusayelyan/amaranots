<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseOtherAttrCat extends Model
{
    use HasFactory;

    protected $table = "house_other_attr_cat";

    protected $fillable = [
        'name',
        'parent_id',
        'type',
        'value'
    ];


    public function otherAttrTrans(){
        return $this->hasOne(HouseOtherAttrCatTrans::class, "attr_cat_id");
    }

    public function otherAttrSub(){
        return $this->hasMany(HouseOtherAttrCat::class, "parent_id");
    }
}
