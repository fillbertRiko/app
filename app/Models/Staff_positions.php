<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Staff_positions extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'staff_positions';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'staff_position_name', 'staff_position_status'
    ];
    public function staff()
    {
        return $this->hasMany('App\Models\Staff', 'staff_staff_position', 'id');
    }
    public function staffRole()
    {
        return $this->hasMany('App\Models\StaffRole', 'staff_role_staff_position', 'id');
    }
}
