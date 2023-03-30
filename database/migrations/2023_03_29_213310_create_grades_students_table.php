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
        Schema::create('grades_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grade_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('generation_id');
            $table->string('group');
            $table->timestamps();

            $table->foreign('grade_id')->references('id')->on('grades');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('generation_id')->references('id')->on('generations');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades_students');
    }
};
