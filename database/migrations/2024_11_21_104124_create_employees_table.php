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
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('position_id');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
            $table->string('password');
            $table->string('full_name', 40);
            $table->string('nick_name', 20);
            $table->date('birthday');
            $table->string('citizen_identification', 12);
            $table->string('phone_number', 11);
            $table->integer('salary_coefficient');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
