<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleInvoiceDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Tao data cho bang sale_invoice_details
        DB::table('sale_invoice_details')->insert([
            'SaleInvoiceDetailID' => 1,
            'SaleInvoiceID' => 1,
            'ProductID' => 1,
            'Quantity' => 2,
            'Price' => 10000,
        ],
        [
            'SaleInvoiceDetailID' => 2,
            'SaleInvoiceID' => 1,
            'ProductID' => 2,
            'Quantity' => 3,
            'Price' => 15000,
        ],
        [
            'SaleInvoiceDetailID' => 3,
            'SaleInvoiceID' => 2,
            'ProductID' => 3,
            'Quantity' => 4,
            'Price' => 20000,
        ]);
    }
}
