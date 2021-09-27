<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourOtherAttr extends Model
{
    use HasFactory;

    protected $table = "tour_other_attr";

    protected $fillable = [
        'name',
        'parent_id',
        'type',
        'value'
    ];
}
