<?php

namespace Database\Seeders;

use App\Models\Customers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //tao du lieu cho database
        DB::table('customers')->insert([
            'CustomerID' => 1,
            'CustomerName' => 'Nguyen Van A',
            'Phone' => '0123456789',
            'Address' => 'Ha Noi',
        ],
        [
            'CustomerID' => 2,
            'CustomerName' => 'Nguyen Van B',
            'Phone' => '0123456789',
            'Address' => 'Ha Noi',
        ],
        [
            'CustomerID' => 3,
            'CustomerName' => 'Nguyen Van C',
            'Phone' => '0123456789',
            'Address' => 'Ha Noi',
        ]
    );
        
    }
}
