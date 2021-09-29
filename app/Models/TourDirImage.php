<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourDirImage extends Model
{
    use HasFactory;

    protected $table = "tour_dir_images";

    protected $fillable = [
        'tour_dir_id',
        'img'
    ];
}
