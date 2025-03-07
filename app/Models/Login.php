<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table = 'user_account';
    protected $primaryKey = 'AccountID';
    public $timestamps = false;
}
