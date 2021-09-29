<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourAttrTemp extends Model
{
    use HasFactory;

    protected $table = "tour_attr_temp";

    protected $fillable = [
        'name',
        'parent'
    ];
}
