<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Tao data cho bang suppliers
        DB::table(  'suppliers')->insert([
            'SupplierID'=>1,
            'SupplierName'=>'Công ty TNHH ABC',
            'Phone'=>'0123456789',
            'Address'=>'123 Đường ABC, Quận 1, TP.HCM'
            ]);
    }
}
