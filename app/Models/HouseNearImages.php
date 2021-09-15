<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseNearImages extends Model
{
    use HasFactory;

    protected $table = "house_near_images";

    protected $fillable = [
        'house_id',
        'img',
        'distance'
    ];
}
