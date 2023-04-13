<?php

namespace Tests\Feature\app\Http\Controllers\Students;

use App\Models\Student;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class GetAllStudentsControllerTest extends TestCase
{
    public function testShouldAPI10GetAllStudentsResponseSuccess(): void
    {
        // Dado estos datos en la BD (detrás de cada create hay un INSERT)
        // Suponiendo que esta información está en la base de datos
        $studentKennit = Student::create([
            'names' => 'Kennit',
            'last_names' => 'Ruz',
            'document' => '123321123',
        ]);

        $studentAbner = Student::create([
            'names' => 'Abner',
            'last_names' => 'Romero',
            'document' => '321123321',
        ]);

        // Al consumir el servicio '/api/1.0/students
        $response = $this->get('/api/1.0/students');

        // El servicio debería retornar de la siguiente manera:
        $response->assertJson([
            "data" => [
                [
                    "id" => $studentKennit->id,
                    "document" => '123321123',
                    "names" => "Kennit",
                    "last_names" => 'Ruz',
                ],
                [
                    "id" => $studentAbner->id,
                    "document" => '321123321',
                    "names" => "Abner",
                    "last_names" => 'Romero',
                ]
            ]
        ]);

        // Y debería responder con un HTTP STATUS CODE en 200
        $response->assertStatus(Response::HTTP_OK);
    }

    public function testShouldAPI10GetAllStudentsResponseFailThereNotStudents(): void
    {
        // No creamos ningún estudiante, es decir, la tabla students debe estar vacía

        // Al consumir el servicio '/api/1.0/students
        $response = $this->get('/api/1.0/students');

        // El servicio debería retornar de la siguiente manera:
        $response->assertJson([
            'error' => [
                'code' => 'CODE_THERE_ARE_NO_STUDENTS',
                'title' => 'No hay estudiantes',
                'detail' => 'No se han registrado estudiantes'
            ]
        ]);

        // Y debería responder con un HTTP STATUS CODE en 400
        $response->assertStatus(Response::HTTP_BAD_REQUEST);
    }
}
