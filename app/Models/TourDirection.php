<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourDirection extends Model
{
    use HasFactory;

    protected $table = "tour_directions";

    protected $fillable = [
        'name',
        'start',
        'end'
    ];
}
