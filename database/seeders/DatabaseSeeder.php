<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            UserAccountSeeder::class,
            PermissionSeeder::class,
            StaffPositionSeeder::class,
            UnitOfMeasurementSeeder::class,
            WarehouseSeeder::class,
            StaffSeeder::class,
            CustomerSeeder::class,
            SupplierSeeder::class,
            ProductSeeder::class,
            MaterialSeeder::class,
            SaleInvoiceSeeder::class,
            SaleInvoiceDetailSeeder::class,
            ImportInvoiceSeeder::class,
            ImportInvoiceDetailSeeder::class,
            StaffLoginSeeder::class,
        ]);
    }
}
