<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grade_subject_id');
            $table->unsignedBigInteger('generation_id');
            $table->foreign('grade_subject_id')->references('id')->on('grades_subjects');
            $table->foreign('generation_id')->references('id')->on('generations');
            $table->integer('percentage');
            $table->date('end_date');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};







    