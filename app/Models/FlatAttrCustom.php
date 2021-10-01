<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlatAttrCustom extends Model
{
    use HasFactory;

    protected $table = "flats_attr_custom";

    protected $fillable = [
        'flat_id',
        'lang',
        'name',
        'notes',
        'paid',
        'price'
    ];
}
