<?php

use App\Http\Controllers\CreateSubjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Permite obtener una lista de los estudiantes
Route::get('/1.0/students',  [
    StudentController::class, 'getstudents'
]);

// Permite la creacion de un estudiante
Route::post('/1.0/students', [
    StudentController::class, 'create'
]);

//Permite actualizar los datos de un estudiante
route::put('/1.0/students/{studentId}', [
    StudentController::class, 'update'
]);

Route::post('/1.0/subjects', CreateSubjectController::class);

Route::put('/1.0/subjects/{subjectId}', UpdateSubjectController::class);