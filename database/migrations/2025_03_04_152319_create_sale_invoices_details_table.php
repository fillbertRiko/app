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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_invoices_details');
    }
};
