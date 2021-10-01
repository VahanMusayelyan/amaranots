<?php

namespace App\Models;

use App\Scopes\LanguageScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlatOtherAttrCatTrans extends Model
{
    use HasFactory;

    protected $table = "flats_other_attr_cattrans";

    protected $fillable = [
        'lang',
        'attr_cat_id',
        'name'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new LanguageScope);
    }
}
