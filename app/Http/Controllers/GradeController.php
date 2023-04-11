<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function getgrades(): JsonResponse
    {
        $grades = Grade::all();
        return response()->json($grades);
    }
}
