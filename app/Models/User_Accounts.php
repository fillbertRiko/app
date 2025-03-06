<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User_Accounts extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_accounts';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'user_email', 'user_password', 'user_status'
    ];
    public function userTransaction()
    {
        return $this->hasMany('App\Models\Transactions', 'transaction_user', 'id');
    }
    public function userRole()
    {
        return $this->belongsTo('App\Models\User_Roles', 'user_role', 'id');
    }
}
