<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourTrans extends Model
{
    use HasFactory;

    protected $table = "tours";

    protected $fillable = [
        'lang',
        'tour_id',
        'name',
        'state',
        'city',
        'address',
        'about'
    ];
}
