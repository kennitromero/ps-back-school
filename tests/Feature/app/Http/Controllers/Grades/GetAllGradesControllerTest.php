<?php

namespace Tests\Feature\app\Http\Controllers\Grades;

use App\Models\Generation;
use App\Models\Grade;
use App\Models\GradeStudent;
use App\Models\Student;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class GetAllGradesControllerTest extends TestCase
{

    public function testShouldAPI10GetAllGradesResponseSuccess(): void
    {
        $grade = Grade::create([
            'grade' => 7,
        ]);

        $student = Student::create([
            'names' => 'Kennit',
            'last_names' => 'Ruz',
            'document' => '123321123',
        ]);

        $generation = Generation::create([
            'year' => '2029',
        ]);

        $gradestudent = GradeStudent::create([
            'group' => '2',
            'grade_id' => $grade->id,
            'student_id' => $student->id,
            'generation_id' => $generation->id
        ]);
        $generation_id = $generation->id;

        $response = $this->get('api/1.0/generations/' . intval($generation_id) . '/grades/');

        $response->assertJson([
            "data" => [
                [
                    'id' => $grade->id,
                    'grade' => $grade->grade
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
                'title' => 'No hay grados',
                'detail' => 'No se han registrado grados'
            ]
        ]);
        $response->assertStatus(Response::HTTP_BAD_REQUEST);
    }
}
