<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use App\Models\Student;
use Throwable;

class GetOneStudentController extends Controller
{
    public function __invoke(int $userId): JsonResponse
    {
        try {
            $student = Student::findOrFail($userId);

            return response()->json([
                'data' => [
                    'id' => $student->id,
                    'document' => $student->document,
                    'names' => $student->names,
                    'last_names' => $student->last_names,
                ]
            ]);
        } catch (ModelNotFoundException $modelNotFoundException) {
            return response()->json([
                'error' => [
                    'code' => 'CODE_THERE_NOT_EXIST_STUDENT_WITH_THIS_ID',
                    'title' => 'No existe estudiante',
                    'detail' => 'No existe estudiante con el Id suministrado.'
                ]
            ], 400);
        } catch (Throwable $e) {
            return $this->responseGeneralError();
        }
    }
}
