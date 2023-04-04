<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


//class ActivitiesController extends Controller
{
    public function index(): JsonResponse
    {
    }
    public function show(int $grade_sucject_Id): JsonResponse
    {
    }
    public function create(Request $request): JsonResponse
    {
    }
    public function update(Request $request, int $grade_sucject_Id): JsonResponse
    {
    }
    public function delete(int $grade_sucject_Id): JsonResponse
    {
    }
}




use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    public function index(): JsonResponse
    {
        $data = [
            'message' => 'Bienvenido a la API de actividades'
        ];

        return response()->json($data);
    }

    public function show(int $grade_subject_Id): JsonResponse
    {
        // Lógica para recuperar la materia/grado especificado de la base de datos
        $grade_subject = GradeSubject::find($grade_subject_Id);

        if ($grade_subject) {
            return response()->json($grade_subject);
        } else {
            return response()->json(['error' => 'Materia/grado no encontrado'], 404);
        }
    }
    // La primera línea dice "usa la clase JsonResponse del paquete Illuminate\Http".
    // La segunda línea dice "usa la clase Request del paquete Illuminate\Http".
    //La tercera línea dice "crea una clase llamada ActivitiesController que herede de la clase Controller".
    //La cuarta línea dice "crea una función pública llamada index que devuelve una respuesta en formato JSON".
    //La quinta línea dice "crea una variable llamada data que contiene un arreglo asociativo con un mensaje de bienvenida".
    //La sexta línea dice "devuelve una respuesta en formato JSON que contiene la variable data".//

    public function create(Request $request): JsonResponse
    {
        // Lógica para crear una nueva materia/grado en la base de datos
        $grade_subject = new GradeSubject;
        $grade_subject->name = $request->name;
        $grade_subject->description = $request->description;
        $grade_subject->save();

        return response()->json($grade_subject, 201);
    }

    public function update(Request $request, int $grade_subject_Id): JsonResponse
    {
        // Lógica para actualizar la materia/grado especificado en la base de datos
        $grade_subject = GradeSubject::find($grade_subject_Id);

        if ($grade_subject) {
            $grade_subject->name = $request->name;
            $grade_subject->description = $request->description;
            $grade_subject->save();

            return response()->json($grade_subject);
        } else {
            return response()->json(['error' => 'Materia/grado no encontrado'], 404);
        }
    }

    public function delete(int $grade_subject_Id): JsonResponse
    {
        // Lógica para eliminar la materia/grado especificado de la base de datos
        $grade_subject = GradeSubject::find($grade_subject_Id);

        if ($grade_subject) {
            $grade_subject->delete();

            return response()->json(['message' => 'Materia/grado eliminado']);
        } else {
            return response()->json(['error' => 'Materia/grado no encontrado'], 404);
        }
    }
}
