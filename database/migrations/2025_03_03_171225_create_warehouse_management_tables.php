<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tạo bảng user_accounts
        Schema::create('user_accounts', function (Blueprint $table) {
            $table->increments('AccountID');
            $table->string('UsernameAcc', 100)->unique();
            $table->string('PasswordAcc', 100)->unique();
        });

        // Tạo bảng permissions
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('PermissionID');
            $table->string('PermissionName', 50)->unique();
        });

        // Tạo bảng staff_positions
        Schema::create('staff_positions', function (Blueprint $table) {
            $table->increments('PositionID');
            $table->string('PositionName', 50)->unique();
        });

        // Tạo bảng unit_of_measurements
        Schema::create('unit_of_measurements', function (Blueprint $table) {
            $table->increments('UnitID');
            $table->string('UnitName', 20)->unique();
        });

        // Tạo bảng warehouses
        Schema::create('warehouses', function (Blueprint $table) {
            $table->increments('WarehouseID');
            $table->string('WarehouseName', 100);
            $table->string('Location', 255)->nullable();
        });

        // Tạo bảng staff
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('StaffID');
            $table->string('Fullname', 100);
            $table->string('Phone', 15)->nullable();
            $table->string('Email', 100)->unique()->nullable();
            $table->unsignedInteger('PositionID')->nullable();
            $table->unsignedInteger('PermissionID')->nullable();
            $table->foreign('PositionID')
                ->references('PositionID')
                ->on('staff_positions')
                ->onDelete('set null');
            $table->foreign('PermissionID')
                ->references('PermissionID')
                ->on('permissions')
                ->onDelete('set null');
        });

        // Tạo bảng customers
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('CustomerID');
            $table->string('CustomerName', 100);
            $table->string('Phone', 15)->nullable();
            $table->string('Address', 255)->nullable();
        });

        // Tạo bảng suppliers
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('SupplierID');
            $table->string('SupplierName', 100);
            $table->string('Phone', 15)->nullable();
            $table->string('Address', 255)->nullable();
        });

        // Tạo bảng products
        Schema::create('products', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // đảm bảo dùng InnoDB
            $table->increments('ProductID');
            $table->string('ProductName', 100);
            $table->unsignedInteger('UnitID')->nullable();
            $table->decimal('UnitPrice', 18, 2);
            $table->unsignedInteger('WarehouseID')->nullable();
            $table->foreign('UnitID')->references('UnitID')->on('unit_of_measurements')->onDelete('set null');
            $table->foreign('WarehouseID')->references('WarehouseID')->on('warehouses')->onDelete('set null');
        });
        

        // Tạo bảng materials với MaterialID kiểu string và thêm các cột bổ sung
        Schema::create('materials', function (Blueprint $table) {
            $table->string('MaterialID', 50)->primary();
            $table->string('MaterialName', 100);
            $table->unsignedInteger('UnitID')->nullable();
            $table->decimal('UnitPrice', 18, 2);
            $table->unsignedInteger('WarehouseID')->nullable();
            $table->foreign('UnitID')
                ->references('UnitID')
                ->on('unit_of_measurements')
                ->onDelete('set null');
            $table->foreign('WarehouseID')
                ->references('WarehouseID')
                ->on('warehouses')
                ->onDelete('restrict');
            $table->float('Thickness');
            $table->float('Density');
            $table->float('FinishedProductDensity');
        });

        // Tạo bảng sale_invoices
        Schema::create('sale_invoices', function (Blueprint $table) {
            $table->increments('InvoiceID');
            $table->unsignedInteger('CustomerID')->nullable();
            $table->unsignedInteger('StaffID')->nullable();
            $table->dateTime('InvoiceDate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->decimal('TotalAmount', 18, 2)->nullable();
            $table->foreign('CustomerID')
                ->references('CustomerID')
                ->on('customers')
                ->onDelete('set null');
            $table->foreign('StaffID')
                ->references('StaffID')
                ->on('staff')
                ->onDelete('set null');
            $table->index('CustomerID', 'idx_CustomerID');
            $table->index('StaffID', 'idx_StaffID');
        });

        // Tạo bảng sale_invoice_details
        Schema::create('sale_invoice_details', function (Blueprint $table) {
            $table->unsignedInteger('InvoiceID');
            $table->unsignedInteger('ProductID');
            $table->integer('Quantity');
            $table->decimal('Price', 18, 2);
            $table->primary(['InvoiceID', 'ProductID']);
            $table->foreign('InvoiceID')
                ->references('InvoiceID')
                ->on('sale_invoices')
                ->onDelete('cascade');
            $table->foreign('ProductID')
                ->references('ProductID')
                ->on('products')
                ->onDelete('cascade');
        });


        // Tạo bảng import_invoices
        Schema::create('import_invoices', function (Blueprint $table) {
            $table->increments('ImportID');
            $table->unsignedInteger('SupplierID')->nullable();
            $table->unsignedInteger('StaffID')->nullable();
            $table->dateTime('InvoiceDate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->decimal('TotalAmount', 18, 2)->nullable();
            $table->foreign('SupplierID')
                ->references('SupplierID')
                ->on('suppliers')
                ->onDelete('set null');
            $table->foreign('StaffID')
                ->references('StaffID')
                ->on('staff')
                ->onDelete('set null');
            $table->index('SupplierID', 'idx_SupplierID');
            $table->index('StaffID', 'idx_StaffID');
        });

        // Tạo bảng import_invoice_details
        Schema::create('import_invoice_details', function (Blueprint $table) {
            $table->unsignedInteger('ImportID');
            $table->string('MaterialID', 50);
            $table->integer('Quantity');
            $table->decimal('Price', 18, 2);
            $table->primary(['ImportID', 'MaterialID']);
            $table->foreign('ImportID')
                ->references('ImportID')
                ->on('import_invoices')
                ->onDelete('cascade');
            $table->foreign('MaterialID')
                ->references('MaterialID')
                ->on('materials')
                ->onDelete('cascade');
        });

        // Tạo bảng staff_logins (đăng nhập theo nhân viên, dựa trên StaffID)
        Schema::create('staff_logins', function (Blueprint $table) {
            $table->increments('LoginID');
            $table->unsignedInteger('StaffID');
            $table->string('Username', 100)->unique();
            $table->string('Password', 255);
            $table->timestamp('LastLogin')->nullable();
            $table->foreign('StaffID')
                ->references('StaffID')
                ->on('staff')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse_management_tables');
        Schema::dropIfExists('staff_logins');
        Schema::dropIfExists('import_invoice_details');
        Schema::dropIfExists('import_invoices');
        Schema::dropIfExists('sale_invoice_details');
        Schema::dropIfExists('sale_invoices');
        Schema::dropIfExists('materials');
        Schema::dropIfExists('products');
        Schema::dropIfExists('suppliers');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('staff');
        Schema::dropIfExists('warehouses');
        Schema::dropIfExists('unit_of_measures');
        Schema::dropIfExists('staff_positions');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('user_accounts');
    }
};
