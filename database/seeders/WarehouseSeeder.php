<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Tao data cho bang warehouses
        DB::table('warehouses')->insert([
            'WarehouseID' => 1,
            'WarehouseName' => 'Kho hàng A',
            'Location' => '123 Đường ABC, Quận 1, TP.HCM'
        ]);
    }
}
