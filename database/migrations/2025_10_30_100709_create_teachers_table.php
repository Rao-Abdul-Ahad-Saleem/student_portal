<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('designation')->nullable(); // e.g. Lecturer, Professor
            $table->foreignId('department_id')
                ->constrained()
                ->onDelete('cascade'); // links to departments table
            $table->string('qualification')->nullable();
            $table->integer('experience_years')->default(0);
            $table->date('joining_date')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
