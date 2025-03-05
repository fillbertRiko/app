<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitOfMeasurementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Tao data cho bang unit_of_measurements
        DB::table('unit_of_measurements')->insert([
            'UnitID' => 1,
            'UnitName' => 'Cái',
        ]);
    }
}
