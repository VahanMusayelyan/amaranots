<?php

namespace App\Models;

use App\Scopes\LanguageScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlatAttrTrans extends Model
{
    use HasFactory;

    protected $table = "flats_attr_trans";

    protected $fillable = [
        'lang',
        'attr_id',
        'name'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new LanguageScope);
    }

}
