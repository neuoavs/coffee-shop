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
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('unit_id')->nullable();
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('set null')->onUpdate('cascade');
            $table->string('name', 30);
            $table->string('image')->nullable();
            $table->boolean('active')->default(1);
            $table->unique('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
