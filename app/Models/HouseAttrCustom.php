<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseAttrCustom extends Model
{
    use HasFactory;

    protected $table = "house_attr_custom";

    protected $fillable = [
        'house_id',
        'lang',
        'name',
        'notes',
        'paid',
        'price'
    ];
}
