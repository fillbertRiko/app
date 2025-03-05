<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImportInvoiceDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //tao data cho bang import_invoice_details
        DB::table('import_invoice_details')->insert([
            'ImportID' => 1,
            'MaterialID' => 'VT001',
            'Quantity' => 100,
            'Price' => 100000,
        ],
        [
            'ImportID' => 1,
            'MaterialID' => 'VT002',
            'Quantity' => 200,
            'Price' => 200000,
        ],
        [
            'ImportID' => 2,
            'MaterialID' => 'VT001',
            'Quantity' => 300,
            'Price' => 300000,
        ],
        [
            'ImportID' => 3,
            'MaterialID' => 'VT002',
            'Quantity' => 400,
            'Price' => 400000,
        ]
    );
    }
}
