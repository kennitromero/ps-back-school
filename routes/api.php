<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

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