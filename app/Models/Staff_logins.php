<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Staff_logins extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'staff_logins';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'staff_login_username', 'staff_login_password', 'staff_login_status'
    ];
    public function staff()
    {
        return $this->belongsTo('App\Models\Staff', 'staff_login_staff', 'id');
    }
    public function staffLoginLog()
    {
        return $this->hasMany('App\Models\StaffLoginLog', 'staff_login_log_staff_login', 'id');
    }
    public function staffRole()
    {
        return $this->hasMany('App\Models\StaffRole', 'staff_role_staff_login', 'id');
    }
}
