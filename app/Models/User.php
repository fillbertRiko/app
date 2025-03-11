<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Các trường có thể gán giá trị hàng loạt
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    // Các trường cần ẩn khi trả về mảng/JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Ép kiểu dữ liệu cho các trường
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Giá trị mặc định cho các trường
    protected $attributes = [
        'role' => 'staff',
    ];
}
