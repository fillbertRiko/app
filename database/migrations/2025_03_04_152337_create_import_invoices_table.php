<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('import_invoices');
    }
};
