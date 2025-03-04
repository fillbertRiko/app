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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
