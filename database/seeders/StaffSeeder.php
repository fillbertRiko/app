<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Tao data cho bang staffs
        DB::table('staffs')->insert([
            'StaffID' => 1,
            'Fullname' => 'Nguyễn Văn A',
            'Phone' => '0123456789',
            'Email' => 'anha@gmail.com',
            'PositionID' => 1,
            'PermissionID' => 1
        ]);
            
    }
}
