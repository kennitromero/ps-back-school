<?php

namespace App\Http\Controllers\Subjects;

use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Throwable;

class GetAllSubjectsController extends Controller
{
    public function __invoke(): JsonResponse
    {
        try {
            $subjects = Subject::select(['id', 'name'])->get();

            if ($subjects->isEmpty()) {
                return response()->json([
                    'error' => [
                        'code' => 'CODE_THERE_ARE_NO_SUBJECTS',
                        'title' => 'No hay asignaturas',
                        'detail' => 'No se han registrado asignaturas'
                    ]
                ], 400);
            }
            return response()->json([
                'data' => $subjects
            ]);

        } catch (Throwable $e) {
            return response()->json([
                'error' => [
                    'code' => 'CODE_GENERAL_ERROR',
                    'title' => 'Ocurrió un error',
                    'detail' => 'Estamos trabajando para solucionarlo.'
                ]
            ]);
        }
    }
}
