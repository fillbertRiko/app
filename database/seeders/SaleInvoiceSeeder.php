<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleInvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Tao data cho bang sale_invoices
        DB::table('sale_invoices')->insert([
            'SaleInvoiceID' => 1,
            'CustomerID' => 1,
            'SaleDate' => '2021-10-01',
            'Total' => 50000,
        ],
        [
            'SaleInvoiceID' => 2,
            'CustomerID' => 2,
            'SaleDate' => '2021-10-02',
            'Total' => 80000,
        ],
        [
            'SaleInvoiceID' => 3,
            'CustomerID' => 3,
            'SaleDate' => '2021-10-03',
            'Total' => 100000,
        ]);
    }
}
