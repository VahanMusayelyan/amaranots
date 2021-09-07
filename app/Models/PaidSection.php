<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaidSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_hy',
        'section_en',
        'section_ru',
    ];
}
