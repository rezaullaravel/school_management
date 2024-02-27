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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('clas_id');
            $table->integer('section_id');
            $table->integer('session_id');
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->integer('roll');
            $table->integer('registration');
            $table->string('image');
            $table->string('phone');
            $table->string('email');
            $table->string('password');
            $table->string('birth_certificate');
            $table->string('present_address');
            $table->string('permanent_address');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
