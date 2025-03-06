<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Permissions extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permissions';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'permission_name', 'permission_description'
    ];
    public function role()
    {
        return $this->belongsToMany('App\Models\Role', 'role_permission', 'role_permission_permission', 'role_permission_role');
    }
    public function user()
    {
        return $this->belongsToMany('App\Models\User', 'user_permission', 'user_permission_permission', 'user_permission_user');
    }
    public function rolePermission()
    {
        return $this->hasMany('App\Models\RolePermission', 'role_permission_permission', 'id');
    }
    public function userPermission()
    {
        return $this->hasMany('App\Models\UserPermission', 'user_permission_permission', 'id');
    }
}
