<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StaffLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //tao gia tri cho bang database
        DB::table('staff_logins')->insert([
            'StaffID' => 1,
            'Username' => 'admin',
            'Password' =>Hash::make('123456'),  //ma hoa mat khau cho tai khoan
            'LastLogin' => now(),
        ],
        [
            'StaffID' => 2,
            'Username' => 'staff',
            'Password' =>Hash::make('123456'),  //ma hoa mat khau cho tai khoan
            'LastLogin' => now(),
        ],
        [
            'StaffID' => 3,
            'Username' => 'staff1',
            'Password' =>Hash::make('123456'),  //ma hoa mat khau cho tai khoan
            'LastLogin' => now(),
        ]
    );
    }
}
