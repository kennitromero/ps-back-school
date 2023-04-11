<?php

namespace Tests\Feature\app\Http\Controllers\Students;

use App\Models\Student;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class GetOneStudentControllerTest extends TestCase
{
    public function testShouldAPI10GetOneStudentsResponseSuccess(): void
    {
        // Dado este estudiante en la tabla de students de la base de datos
        $studentAbner = Student::create([
            'names' => 'Abner',
            'last_names' => 'Romero',
            'document' => '321123321',
        ]);

        // Al consumir el servicio '/api/1.0/students
        $response = $this->get("/api/1.0/students/$studentAbner->id");

        // El servicio debería retornar de la siguiente manera:
        $response->assertJson([
            "data" => [
                "id" => $studentAbner->id,
                "document" => '321123321',
                "names" => "Abner",
                "last_names" => 'Romero',
            ]
        ]);

        // Y debería responder con un HTTP STATUS CODE en 200
        $response->assertStatus(Response::HTTP_OK);
    }

    public function testShouldAPI10GetAllStudentsResponseFailThereNotStudents(): void
    {
        // No creamos ningún estudiante, es decir, la tabla students debe estar vacía

        // Al consumir el servicio '/api/1.0/students
        $response = $this->get("/api/1.0/students/-1");

        // El servicio debería retornar de la siguiente manera:
        $response->assertJson([
            'error' => [
                'code' => 'CODE_THERE_NOT_EXIST_STUDENT_WITH_THIS_ID',
                'title' => 'No existe estudiante',
                'detail' => 'No existe estudiante con el Id suministrado.'
            ]
        ]);

        // Y debería responder con un HTTP STATUS CODE en 400
        $response->assertStatus(Response::HTTP_BAD_REQUEST);
    }
}
