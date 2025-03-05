<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImportInvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Tao data cho bang import_invoices
        DB::table('import_invoices')->insert([
            'ImportID' => 1,
            'ImportDate' => '2025-03-04',
            'SupplierID' => 1,
            'StaffID' => 1,
        ],
        [
            'ImportID' => 2,
            'ImportDate' => '2025-03-04',
            'SupplierID' => 2,
            'StaffID' => 2,
        ],
        [
            'ImportID' => 3,
            'ImportDate' => '2025-03-04',
            'SupplierID' => 3,
            'StaffID' => 3,
        ]);
    }
}
