<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlatOtherAttrCat extends Model
{
    use HasFactory;

    protected $table = "flat_other_attr_cat";

    protected $fillable = [
        'name',
        'parent_id',
        'type',
        'value'
    ];


    public function otherAttrTrans(){
        return $this->hasOne(FlatOtherAttrCatTrans::class, "attr_cat_id");
    }

    public function otherAttrSub(){
        return $this->hasMany(FlatOtherAttrCat::class, "parent_id");
    }
}
