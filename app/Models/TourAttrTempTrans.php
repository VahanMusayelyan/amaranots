<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourAttrTempTrans extends Model
{
    use HasFactory;

    protected $table = "tour_attr_temptrans";

    protected $fillable = [
        'lang',
        'attr_id',
        'name'
    ];
}
