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
        // Tạo bảng staff_logins (đăng nhập theo nhân viên, dựa trên StaffID)
        Schema::create('staff_logins', function (Blueprint $table) {
            $table->increments('LoginID');
            $table->unsignedInteger('StaffID')->nullable();
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
        Schema::dropIfExists('staff_logins');
    }
};
