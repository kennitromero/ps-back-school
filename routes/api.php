<?php

use App\Http\Controllers\CreateSubjectController;
use App\Http\Controllers\Students\{
    CreateStudentController,
    GetOneStudentController,
    GetAllStudentsController,
    UpdateStudentController
};
use App\Http\Controllers\GetGradesByGenerationController;


use Illuminate\Support\Facades\Route;

Route::get('/1.0/students',  GetAllStudentsController::class);
route::get('/1.0/students/{studentId}', GetOneStudentController::class);
Route::post('/1.0/students', CreateStudentController::class);
Route::put('/1.0/students/{studentId}', UpdateStudentController::class);

Route::post('/1.0/subjects', CreateSubjectController::class);

Route::get('/1.0/generations/{generationId}/grades/', GetGradesByGenerationController::class);
