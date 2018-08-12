<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wesite_User extends Model
{
    protected $table = 'website_users';
    protected $fillable = [
        'name',
        'email',
        'password'
    ];
}