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
            $table->unsignedInteger('position_id')->nullable();
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('set null')->onUpdate('cascade');
            $table->string('password');
            $table->string('full_name', 40)->nullable();
            $table->string('nickname', 20);
            $table->date('birthday')->nullable();
            $table->string('citizen_identification', 12);
            $table->string('phone_number', 11);
            $table->integer('salary_coefficient');

            //Rằng buộc
            $table->unique('nickname');
            $table->unique('citizen_identification');
            $table->unique('phone_number');
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
