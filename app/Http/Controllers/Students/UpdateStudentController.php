<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class UpdateStudentController extends Controller
{
    public function __invoke(Request $request, int $studentId): JsonResponse
    {
        // intento hacer lo siguiente, si hay algún error, se lo atrapará el catch
        try {
            if (!$request->exists('names')) {
                return response()->json([
                    'error' => [
                        'code' => 'CODE_FORM_ERROR',
                        'title' => 'names',
                        'detail' => 'El nombre es obligatorio'
                    ]
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            if (!$request->exists('last_names')) {
                return response()->json([
                    'error' => [
                        'code' => 'CODE_FORM_ERROR',
                        'title' => 'last_names',
                        'detail' => 'Los apellidos son obligatorios'
                    ]
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            // Busco el estudiante en la tabla students a través del $studentId que se envía en la URL
            $student = Student::findOrFail($studentId);

            // Actualizo cada una de los datos del estudiante
            $student->update([
                'names' => $request->input('names'),
                'last_names' => $request->input('last_names'),
            ]);

            // Utilizo el método save para ejecutar la actualización
            $student->save();

            // respondo la información actualizada
            return response()->json([
                'data' => [
                    'document' => $student->document,
                    'names' => $student->names,
                    'last_names' => $student->last_names,
                ]
            ], Response::HTTP_OK);
        } catch (ModelNotFoundException $modelNotFoundException) {
            return response()->json([
                'error' => [
                    'code' => 'CODE_THERE_NOT_EXIST_STUDENT_WITH_THIS_ID',
                    'title' => 'No existe estudiante',
                    'detail' => 'No existe estudiante con el Id suministrado.'
                ]
            ], Response::HTTP_BAD_REQUEST);
        } catch (Throwable $throwable) {
            return $this->responseGeneralError();
        }
    }
}
