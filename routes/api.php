<?php

use App\Http\Controllers\CreateSubjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/1.0/subjects', CreateSubjectController::class);