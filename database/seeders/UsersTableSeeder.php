<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Tạo tài khoản Admin
        User::create([
            'name'     => 'Admin User',
            'email'    => 'admin@example.com',
            'password' => Hash::make('password'), // băm mật khẩu bằng Bcrypt
            'role'     => 'admin',
        ]);

        // Tạo tài khoản Staff
        User::create([
            'name'     => 'Staff User',
            'email'    => 'staff@example.com',
            'password' => Hash::make('password'),
            'role'     => 'staff',
        ]);

        User::factory(15)->create();
    }
}
