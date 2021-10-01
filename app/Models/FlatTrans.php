<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlatTrans extends Model
{
    use HasFactory;

    protected $table = "flats_trans";

    protected $fillable = [
        'lang',
        'flat_id',
        'name',
        'state',
        'city',
        'address'
    ];
}
