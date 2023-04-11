<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CreateSubjectController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        // creacion de materia
        $subject = Subject::create([
            'name' => $request->input('name'),

        ]);

        return response()->json($subject);
    }
}
