<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlatOtherAttr extends Model
{
    use HasFactory;

    protected $table = "flats_other_attr";

    protected $fillable = [
        'attr_cat_id',
        'flat_id',
        'value'
    ];
}
