<?php

namespace App\Models;

use http\Client\Curl\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    use HasFactory;

    protected $table = "users_contacts";

    protected $fillable = [
        'user_id',
        'type',
        'value'
    ];

}
