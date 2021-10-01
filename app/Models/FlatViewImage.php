<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlatViewImage extends Model
{
    use HasFactory;

    protected $table = "flats_view_images";

    protected $fillable = [
        'flat_id',
        'img',
        'main'
    ];
}
