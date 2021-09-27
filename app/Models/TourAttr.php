<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourAttr extends Model
{
    use HasFactory;

    protected $table = "tour_attr";

    protected $fillable = [
        'tour_dir_id',
        'attr_id',
        'value'
    ];
}
