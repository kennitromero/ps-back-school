<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetGradesByGenerationController extends Controller
{
    public function __invoke(int $generationId): JsonResponse
    {
        $grades = Grade::select(['grades.id', 'grades.grade'])
            ->join('grades_students', 'grades_students.grade_id', '=', 'grades.id')
            ->where('grades_students.generation_id', '=', $generationId)
            ->get();

        return response()->json([
            'data'=> $grades
        ]);
    }
}
