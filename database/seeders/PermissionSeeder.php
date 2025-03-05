<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //tao data cho bang permissions
        DB::table('permissions')->insert([
            'PermissionID' => 1,
            'PermissionName' => 'Admin',
            'PermissionDescription' => 'Quản trị viên',
        ],
        [
            'PermissionID' => 2,
            'PermissionName' => 'Manager',
            'PermissionDescription' => 'Quản lý',
        ],
        [
            'PermissionID' => 3,
            'PermissionName' => 'Staff',
            'PermissionDescription' => 'Nhân viên',
        ]);
    }
}
