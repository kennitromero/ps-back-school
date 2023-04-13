<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class CreateStudentController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        try {
            if (! $request->exists('document')) {
                return response()->json([
                    'error' => [
                        'code' => 'CODE_FORM_ERROR',
                        'title' => 'document',
                        'detail' => 'El documento es obligatorio'
                    ]
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            if (! $request->exists('names')) {
                return response()->json([
                    'error' => [
                        'code' => 'CODE_FORM_ERROR',
                        'title' => 'names',
                        'detail' => 'El nombre es obligatorio'
                    ]
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            if (! $request->exists('last_names')) {
                return response()->json([
                    'error' => [
                        'code' => 'CODE_FORM_ERROR',
                        'title' => 'last_names',
                        'detail' => 'Los apellidos son obligatorios'
                    ]
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            $existingStudent = Student::where('document', '=', $request->input('document'))->get();

            if ($existingStudent->isNotEmpty()) {
                return response()->json([
                    'error' => [
                        'code' => 'CODE_THERE_ALREADY_STUDENT_WITH_DOCUMENT',
                        'title' => 'Documento ya existente',
                        'detail' => 'Estudiante con documento ya existente.'
                    ]
                ], Response::HTTP_BAD_REQUEST);
            }

            $student = Student::create([
                'document' => $request->input('document'),
                'names' => $request->input('names'),
                'last_names' => $request->input('last_names'),
            ]);

            return response()->json([
                'data' => [
                    'document' => $student->document,
                    'names' => $student->names,
                    'last_names' => $student->last_names,
                ]
            ]);
        } catch (Throwable $throwable) {
            return $this->responseGeneralError();
        }
    }
}
