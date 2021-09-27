<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = "blogs";

    protected $fillable = [
        'theme',
        'tags',
        'header',
        'content_first',
        'content_second',
        'img_first',
        'img_second'
    ];

    protected $with = ['blogTrans'];

    public function blogTrans(){
        return $this->hasOne(BlogTrans::class, "blog_id");
    }
}
