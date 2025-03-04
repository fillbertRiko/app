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
        // Tạo bảng suppliers
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('SupplierID');
            $table->string('SupplierName', 100);
            $table->string('Phone', 15)->nullable();
            $table->string('Address', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
