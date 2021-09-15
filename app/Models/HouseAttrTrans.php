<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseAttrTrans extends Model
{
    use HasFactory;

    protected $table = "house_attr_trans";

    protected $fillable = [
        'lang',
        'attr_id',
        'name'
    ];
}
