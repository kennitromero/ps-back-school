<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/1.0/activities', [
    activitiesController::class, 'index'
]);
Route::get('/1.0/activities/{activitiesId}', [
    activitiesController::class, 'show'
]);
Route::post('/1.0/activities', [
    activitiesController::class, 'create'
]);
Route::put('/1.0/activities/{activitiesId}', [
    activitiesController::class, 'update'
]);
Route::delete('/1.0/activities/{activitiesId}', [
    activitiesController::class, 'delete'
]);
