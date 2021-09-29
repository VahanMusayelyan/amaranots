<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourOtherAttrTrans extends Model
{
    use HasFactory;

    protected $table = "tours";

    protected $fillable = [
        'lang',
        'attr_cat_id',
        'name'
    ];
}
