<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //tao data cho bang products
        DB::table('products')->insert([
            'ProductID' => 1,
            'ProductName' => 'Bánh mì',
            'CategoryID' => 1,
            'Price' => 10000,
        ],
        [
            'ProductID' => 2,
            'ProductName' => 'Bánh bao',
            'CategoryID' => 1,
            'Price' => 15000,
        ],
        [
            'ProductID' => 3,
            'ProductName' => 'Bánh tráng',
            'CategoryID' => 1,
            'Price' => 20000,
        ]);
    }
}
