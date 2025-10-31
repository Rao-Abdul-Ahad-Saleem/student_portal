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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');                    // e.g., Data Structures
            $table->string('code')->unique();          // e.g., CS101
            $table->unsignedBigInteger('department_id'); // FK
            $table->unsignedBigInteger('teacher_id')->nullable(); // FK (optional)
            $table->integer('credit_hours')->default(3);
            $table->string('semester')->nullable();    // e.g., Fall 2025
            $table->text('description')->nullable();
            $table->timestamps();

            // Foreign Keys
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
