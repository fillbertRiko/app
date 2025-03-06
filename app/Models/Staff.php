<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Staff extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'staff';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'staff_name', 'staff_email', 'staff_phone', 'staff_address', 'staff_staff_position', 'staff_status'
    ];
    public function staffPosition()
    {
        return $this->belongsTo('App\Models\Staff_positions', 'staff_staff_position', 'id');
    }
    public function staffLogin()
    {
        return $this->hasMany('App\Models\Staff_logins', 'staff_login_staff', 'id');
    }
    public function staffRole()
    {
        return $this->hasMany('App\Models\StaffRole', 'staff_role_staff', 'id');
    }
}
