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
        Schema::create('shifts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20);
            $table->time('begin_time', $precision = 0);
            $table->time('end_time', $precision = 0);
            $table->boolean('active')->default(1);
            $table->unique('name');
            $table->unique(['begin_time', 'end_time']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shifts');
    }
};
