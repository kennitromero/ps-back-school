<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Models\Student;
use Illuminate\Http\Request;
use Throwable;

class StudentController extends Controller
{
    public function getstudents(): JsonResponse
    {
        try {
            $students = Student::all();

            $data = [];
            foreach ($students as $student) {
                $data[] = [
                    'id' => $student->id,
                    'document' => $student->document,
                    'names' => $student->name,
                    'last_names' => $student->last_name,
                ];
            }
            if (count($data) === 0) {
                return response()->json([
                    'error' => [
                        'code' => 'CODE_THERE_ARE_NO_STUDENTS',
                        'title' => 'No hay estudiantes',
                        'detail' => 'No se han registrado estudiantes'
                    ]
                ], 400);
            }
            return response()->json([
                'data' => $data
            ]);

        } catch (Throwable $e) {
            return response()->json(
                    [
                        'error' => [
                            'code' => 'CODE_GENERAL_ERROR',
                            'title' => 'Ocurrió un error',
                            'detail' => 'Estamos trabajando para solucionarlo.'
                        ]
            ]);
        }
    }

    public function create(Request $request): JsonResponse
    {
        $existingStudent = Student::where('document', $request->input('document'))->first();
        if ($existingStudent) {
            return response()->json(['message' => 'Ya existe un usuario con la misma Identificacion'], 400);
        }

        $student = Student::create([
            'document' => $request->input('document'),
            'name' => $request->input('name'),
            'last_name' => $request->input('last_name'),
        ]);
        return response()->json($student);
    }

    public function update(Request $request, $studentId): JsonResponse
    {
        $student = Student::where('document', $studentId)->firstOrFail();

        //dd($student);
        $student->update([
            'document' => $request->input('document'),
            'name' => $request->input('name'),
            'last_name' => $request->input('last_name'),
        ]);
        $student->save();
        return response()->json($student);
    }

}
