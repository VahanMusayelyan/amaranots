<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CottageHouse extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = "cottage_house";

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
