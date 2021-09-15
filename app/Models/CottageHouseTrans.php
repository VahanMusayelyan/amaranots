<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CottageHouseTrans extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = "cottage_house_trans";

    protected $fillable = [
        'lang',
        'house_id',
        'name',
        'state',
        'city',
        'address',
        'notes'
    ];
}
