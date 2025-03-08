<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    // Define the table associated with the model
    protected $table = 'logins';

    // Define the fillable attributes
    protected $fillable = [
        'username',
        'password',
        'last_login_at',
    ];

    // Define the hidden attributes
    protected $hidden = [
        'password',
    ];

    // Define the casts
    protected $casts = [
        'last_login_at' => 'datetime',
    ];
}