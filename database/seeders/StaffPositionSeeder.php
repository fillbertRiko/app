<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Tao data cho bang staff_positions
        DB::table('staff_positions')->insert([
            'StaffPositionID' => 1,
            'StaffPositionName' => 'Quản lý',
        ],
        [
            'StaffPositionID' => 2,
            'StaffPositionName' => 'Nhân viên',
        ],
        [
            'StaffPositionID' => 3,
            'StaffPositionName' => 'Thực tập sinh',
        ]);
    }
}
