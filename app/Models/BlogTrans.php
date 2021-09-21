<?php

namespace App\Models;

use App\Scopes\LanguageScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTrans extends Model
{
    use HasFactory;

    protected $table = "blogs_trans";

    protected $fillable = [
        'blog_id',
        'lang',
        'theme',
        'tags',
        'header',
        'content_first',
        'content_second'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new LanguageScope);
    }
}
