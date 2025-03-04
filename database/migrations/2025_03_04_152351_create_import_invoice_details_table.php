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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('import_invoice_details');
    }
};
