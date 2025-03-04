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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
