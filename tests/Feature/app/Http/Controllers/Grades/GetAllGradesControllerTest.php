<?php

namespace Tests\Feature\app\Http\Controllers\Grades;

use App\Models\Generation;
use App\Models\Grade;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class GetAllGradesControllerTest extends TestCase
{

    public function testShouldAPI10GetAllGradesResponseSuccess(): void
    {

        $gradefirst = Grade::create([

            'grade' => 1
        ]);

        $gradesecond = Grade::create([

            'grade' => 2
        ]);
        $response= $this->get('/api/1.0/generations/4/grades/');

        $response->assertJson([
            'data' => [
                [
                    'id' => 4,
                    'grade' => 2,
                ],
                [
                    'id' => 4,
                    'grade' => 3,
                ],
            ],
        ]);

        $response->assertStatus(Response::HTTP_OK);

    }

    public function testShouldAPI10GetAllGradesResponseFailThereNotGrades(): void
    {

        $response = $this->get('/api/1.0/generations/4/grades');

        $response->assertJson([
            'error' => [
                'code' => 'CODE_THERE_ARE_NO_GRADES',
                'title' => 'No hay estudiantes',
                'detail' => 'No se han registrado estudiantes'
            ]
        ]);
        $response->assertStatus(Response::HTTP_BAD_REQUEST);
    }
}
