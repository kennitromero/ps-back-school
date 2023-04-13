<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateSubjectController extends Controller
{
    public function __invoke(Request $request, int $subjectId): JsonResponse
    {
        // intento hacer lo siguiente, si hay algún error, se lo atrapará el catch
        try {
            if (!$request->exists('name')) {
                return response()->json([
                    'error' => [
                        'code' => 'CODE_FORM_ERROR',
                        'title' => 'name',
                        'detail' => 'El nombre es obligatorio'
                    ]
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            // Busco la materia en la tabla subject a través del $subjectId que se envía en la URL
            $subject = Subject::findOrFail($subjectId);

            // Actualizo cada una de los datos de las materias
            $subject->update([
                'name' => $request->input('name'),
                ]);

            // Utilizo el método save para ejecutar la actualización
            $subject->save();

            // respondo la información actualizada
            return response()->json([
                'data' => [
                    'id' => $subject->id,
                    'name' => $subject->name
                    ]
            ], Response::HTTP_OK);
        } catch (ModelNotFoundException $modelNotFoundException) {
            return response()->json([
                'error' => [
                    'code' => 'CODE_THERE_NOT_EXIST_STUDENT_WITH_THIS_ID',
                    'title' => 'No existe materia',
                    'detail' => 'No existe materia con el Id suministrado.'
                ]
            ], Response::HTTP_BAD_REQUEST);
        } catch (Throwable $throwable) {
            return $this->responseGeneralError();
        }
    }
}
