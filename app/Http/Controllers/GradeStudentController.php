<?php

namespace App\Http\Controllers;

use App\Models\GradeStudent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GradeStudentController extends Controller
{
    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'grade_id' => 'required|unique:grades,id',
            'student_id' => 'required|unique:students,id',
            'generation_id' => 'required|unique:generations,id',
            'group' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => [
                    'tal_cosa'
                ]
            ]);
        }

        $gradeStudent = GradeStudent::create([
            'grade_id' => $request->input('grade_id'),
            'student_id' => $request->input('student_id'),
            'generation_id' => $request->input('generation_id'),
            'group' => $request->input('group')
        ]);

        return response()->json(['message' => 'Estudiante asignado exitosamente'], 200);
    }

    /*public function update(Request $request, $id): JsonResponse
    {
        $validatedDate = $request->validate([
           'grade_id' => 'required',
           'student_id' => 'required',
           'generation_id' => 'required|unique:students,document,'.$id,
        ]);

        $student = Student::findOrFail($id);
        $student->update([
            'names' => $validatedDate['names'],
            'last_name' => $validatedDate['last_name'],
            'document' => $validatedDate['document'],
        ]);

        return response()->json(['message' => 'Estudiante actualizado exitosamente'], 200);
    }*/
}
