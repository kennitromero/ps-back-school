<?php

namespace Tests\Feature\app\Http\Controllers\Subjects;

use App\Models\Subject;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class GetAllSubjectsControllerTest extends TestCase
{
    public function testShouldAPI10GetAllSubjectsResponseSuccess(): void
    {
        $subjectMath = Subject::create([
            'name' => 'Math',
        ]);

        $subjectChemistry = Subject::create([
            'name' => 'chemistry',
        ]);

        // Al consumir el servicio '/api/1.0/subjects
        $response = $this->get('/api/1.0/subjects');

        // El servicio debería retornar de la siguiente manera:
        $response->assertJson([
            "data" => [
                [
                    "id" => $subjectMath->id,
                    "name" => "Math",
                ],
                [
                    "id" => $subjectChemistry->id,
                    "name" => "chemistry",
                ]
            ]
        ]);

        // Y debería responder con un HTTP STATUS CODE en 200
        $response->assertStatus(Response::HTTP_OK);
    }

    public function testShouldAPI10GetAllSubjectsResponseFailThereNotSubjects(): void
    {
        // No creamos ningún asignatura, es decir, la tabla asignatura debe estar vacía

        // Al consumir el servicio '/api/1.0/subjects
        $response = $this->get('/api/1.0/subjects');

        // El servicio debería retornar de la siguiente manera:
        $response->assertJson([
            "error" => [
                'code' => 'CODE_THERE_ARE_NO_SUBJECTS',
                'title' => 'No hay asignaturas',
                'detail' => 'No se han registrado asignaturas'
            ]
        ]);

        // Y debería responder con un HTTP STATUS CODE en 400
        $response->assertStatus(Response::HTTP_BAD_REQUEST);
    }
}
