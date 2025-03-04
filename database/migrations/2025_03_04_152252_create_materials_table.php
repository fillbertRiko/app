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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
