<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminLogin extends Model
{
    protected $table = 'admin_logins';

    protected $fillable = [
        'username',
        'email',
        'password'
    ];
}
