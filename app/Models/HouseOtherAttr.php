<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseOtherAttr extends Model
{
    use HasFactory;

    protected $table = "house_other_attr";

    protected $fillable = [
        'attr_cat_id',
        'house_id',
        'value'
    ];
}
