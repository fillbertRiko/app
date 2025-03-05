<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //tao data cho bang materials
        DB::table('materials')->insert([
            'MaterialID' => 1,
            'MaterialName' => 'Gạo',
            'Unit' => 'Kg',
            'Price' => 20000,
        ],
        [
            'MaterialID' => 2,
            'MaterialName' => 'Thịt',
            'Unit' => 'Kg',
            'Price' => 100000,
        ],
        [
            'MaterialID' => 3,
            'MaterialName' => 'Rau',
            'Unit' => 'Kg',
            'Price' => 50000,
        ]);
    }
}
