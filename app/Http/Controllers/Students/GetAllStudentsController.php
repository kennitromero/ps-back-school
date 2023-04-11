<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Models\Student;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class GetAllStudentsController extends Controller
{
    public function __invoke(): JsonResponse
    {
        // Intente hacer la siguiente instrucción (lo que está dentro de las llaves)
        try {

            // A través del modelo Student de Eloquent, utilizo el método ->select() para
            // seleccionar solo los datos que quiero obtener de la base y luego el método ->get()
            // para ejecutar la consulta y traer los registros de la tabla students
            $students = Student::select(['id', 'document', 'names', 'last_names'])->get();

            // Utilizo el método isEmpty() de Collection (clase que retorna el método ->get())
            // con el fin de saber si está vacía o no la colección de resultado
            if ($students->isEmpty()) {
                return response()->json([
                    'error' => [
                        'code' => 'CODE_THERE_ARE_NO_STUDENTS',
                        'title' => 'No hay estudiantes',
                        'detail' => 'No se han registrado estudiantes'
                    ]
                ], Response::HTTP_BAD_REQUEST);
            }

            // Si existe información de estudiantes, la retorno.
            return response()->json(['data' => $students], Response::HTTP_OK);
        } catch (Throwable $e) {
            return $this->responseGeneralError();
        }
    }
}
