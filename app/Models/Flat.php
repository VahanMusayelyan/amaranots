<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    use HasFactory;

    protected $table = "flats";

    protected $fillable = [
        'user_id',
        'slug',
        'coordinates',
        'guests',
        'floor',
        'rooms',
        'surface',
        'elevator',
        'check_in',
        'check_out',
        'amount',
        'sale',
        'visitors',
    ];
}
