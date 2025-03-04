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
            /*
            $table->foreign('InvoiceID')
                ->references('InvoiceID')
                ->on('sale_invoices')
                ->onDelete('cascade');
            */
            $table->index('CustomerID', 'idx_CustomerID');
            $table->index('StaffID', 'idx_StaffID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_invoices');
    }
};
