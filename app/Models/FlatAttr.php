<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlatAttr extends Model
{
    use HasFactory;

    protected $table = "flats_attr";

    protected $fillable = [
        'room_id',
        'name',
        'ordering'
    ];


    public function allAttrTrans()
    {
        return $this->hasMany(FlatAttrTrans::class, "attr_id")->withoutGlobalScopes()->orderBy("lang","asc");
    }

    public function attrTrans()
    {
        return $this->hasOne(FlatAttrTrans::class, "attr_id");
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
