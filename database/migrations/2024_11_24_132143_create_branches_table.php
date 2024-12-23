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
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20);
            $table->string('address', 20);
            $table->string('province', 25);
            $table->string('district', 20);
            $table->string('ward', 30);
            
             // Ràng buộc
             $table->unique(['name', 'address', 'province']); // Tên, địa chỉ và tỉnh không được trùng
             $table->unique(['province', 'district', 'ward', 'name']); // Tên không được trùng trong cùng khu vực
             $table->unique(['province', 'district', 'ward', 'address']); // Địa chỉ không được trùng trong cùng khu vực
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
