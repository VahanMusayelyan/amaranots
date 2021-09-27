<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourDirTrans extends Model
{
    use HasFactory;

    protected $table = "tour_dir_trans";

    protected $fillable = [
        'lang',
        'tour_dir_id',
        'notes'
    ];
}
