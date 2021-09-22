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
}
