<?php

namespace Tests\Feature\app\Http\Controllers\Students;

use App\Models\Student;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class CreateStudentControllerTest extends TestCase
{
    public function testShouldAPI10CreateStudentResponseSuccess(): void
    {
        // Datos estos datos para registrar un estudiante (que no existe en la tabla students)
        $dataStudent = [
            'document' => '1234567',
            'names' => 'Kennit',
            'last_names' => 'Ruz',
        ];

        // Al consumir el servicio y enviarle la información de document, names y last_names
        $response = $this->post('/api/1.0/students', $dataStudent);

        // Debería responder de la siguiente manera
        $response->assertJson([
            'data' => [
                'document' => '1234567',
                'names' => 'Kennit',
                'last_names' => 'Ruz',
            ]
        ]);

        // Con el estatus code de HTTP en 200
        $response->assertStatus(Response::HTTP_OK);

        // Y debería existir (coincidir) en la tabla students, la siguiente información:
        $this->assertDatabaseHas(Student::class, [
            'document' => '1234567',
            'names' => 'Kennit',
            'last_names' => 'Ruz',
        ]);
    }

    public function testShouldAPI10CreateStudentResponseFailDocumentUsed(): void
    {
        $documentUsed = '123';

        // Voy a simular que ya existe un estudiante registrado con el documento 123
        Student::create([
            'names' => 'Cualquier nombre',
            'last_names' => 'Cualquier apellido',
            'document' => $documentUsed
        ]);

        // Voy a intentar enviarla el mismo documento que ya existe en la tabla de students
        $dataStudent = [
            'document' => $documentUsed,
            'names' => 'Kennit',
            'last_names' => 'Ruz',
        ];

        // Al consumir el servicio de estudiantes
        $response = $this->post('/api/1.0/students', $dataStudent);

        // Debería retornar un error, con la siguiente estructura
        $response->assertJson([
            'error' => [
                'code' => 'CODE_THERE_ALREADY_STUDENT_WITH_DOCUMENT',
                'title' => 'Documento ya existente',
                'detail' => 'Estudiante con documento ya existente.'
            ]
        ]);

        // y el estatus code de la respuesta debería ser 400
        $response->assertStatus(Response::HTTP_BAD_REQUEST);

        // y no debería existir (coincidir) la siguiente información en la tabla students
        $this->assertDatabaseMissing(Student::class, [
            'document' => $documentUsed,
            'names' => 'Kennit',
            'last_names' => 'Ruz',
        ]);
    }

    public function testShouldAPI10CreateStudentResponseFailDocumentMissing(): void
    {
        // Al consumir el servicio y no se envía información, con el ánimo de ver el error
        $response = $this->post('/api/1.0/students', []);

        // Debería responder de la siguiente manera:
        $response->assertJson([
            'error' => [
                'code' => 'CODE_FORM_ERROR',
                'title' => 'document',
                'detail' => 'El documento es obligatorio'
            ]
        ]);

        // Con el estatus code de HTTP en 422
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function testShouldAPI10CreateStudentResponseFailNamesMissing(): void
    {
        // Al consumir el servicio solo enviamos el documento, para que no de error de document y no enviamos lo demás
        // con el fin de que dé error porque no estamos enviando el names
        $response = $this->post('/api/1.0/students', [
            'document' => '123'
        ]);

        // Debería responder de la siguiente manera:
        $response->assertJson([
            'error' => [
                'code' => 'CODE_FORM_ERROR',
                'title' => 'names',
                'detail' => 'El nombre es obligatorio'
            ]
        ]);

        // Con el estatus code de HTTP en 422
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function testShouldAPI10CreateStudentResponseFailLastNamesMissing(): void
    {
        // Al consumir el servicio enviamos el documento y el names, para que no de error de document ni de names
        // y no enviamos el last_names con el fin de que dé error
        $response = $this->post('/api/1.0/students', [
            'document' => '123',
            'names' => 'Pepito'
        ]);

        // Debería responder de la siguiente manera:
        $response->assertJson([
            'error' => [
                'code' => 'CODE_FORM_ERROR',
                'title' => 'last_names',
                'detail' => 'Los apellidos son obligatorios'
            ]
        ]);

        // Con el estatus code de HTTP en 422
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
