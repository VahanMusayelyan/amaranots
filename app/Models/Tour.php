<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $table = "tours";

    protected $fillable = [
        'user_id',
        'slug',
        'coordinates',
        'with_night',
        'without_night',
        'check_in',
        'check_out',
        'visitors'
    ];
}
