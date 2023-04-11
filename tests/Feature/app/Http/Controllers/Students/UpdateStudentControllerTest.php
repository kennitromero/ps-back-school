<?php

namespace Tests\Feature\app\Http\Controllers\Students;

use App\Models\Student;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class UpdateStudentControllerTest extends TestCase
{
    public function testShouldAPI10UpdateStudentResponseSuccess(): void
    {
        // Hacemos el registro de un estudiante en nuestra tabla students
        $studentExist = Student::create([
            'names' => 'FEDERICO',
            'last_names' => 'PÉREZ',
            'document' => '112233',
        ]);

        // Vamos a actualizar el estudiante anterior, enviándole los siguientes atributos
        $dataStudent = [
            'names' => 'Federico',
            'last_names' => 'Pérez',
        ];

        // Al consumir el servicio y enviarle la información de document, names y last_names
        $response = $this->put("/api/1.0/students/$studentExist->id", $dataStudent);

        // Debería responder de la siguiente manera
        $response->assertJson([
            'data' => [
                'document' => '112233',
                'names' => 'Federico',
                'last_names' => 'Pérez',
            ]
        ]);

        // Con el estatus code de HTTP en 200
        $response->assertStatus(Response::HTTP_OK);

        // Y debería coincidir en la tabla students, la siguiente información:
        // es decir, ya no debería estar en mayúscula los nombres
        $this->assertDatabaseHas(Student::class, [
            'id' => $studentExist->id,
            'document' => '112233',
            'names' => 'Federico',
            'last_names' => 'Pérez',
        ]);
    }

    public function testShouldAPI10CreateStudentResponseFailStudentIdNotExist(): void
    {

        // Al consumir el servicio le enviamos Id (-1) que no existe en la tabla de estudiantes
        $response = $this->put("/api/1.0/students/-1", [
            'names' => 'Kennit',
            'last_names' => 'Ruz'
        ]);

        // Debería responder de la siguiente manera:
        $response->assertJson([
            'error' => [
                'code' => 'CODE_THERE_NOT_EXIST_STUDENT_WITH_THIS_ID',
                'title' => 'No existe estudiante',
                'detail' => 'No existe estudiante con el Id suministrado.'
            ]
        ]);

        // Con el estatus code de HTTP en 422
        $response->assertStatus(Response::HTTP_BAD_REQUEST);
    }

    public function testShouldAPI10CreateStudentResponseFailNamesMissing(): void
    {
        // Hacemos el registro de un estudiante en nuestra tabla students
        $studentExist = Student::create([
            'names' => 'FEDERICO',
            'last_names' => 'PÉREZ',
            'document' => '112233',
        ]);

        // Al consumir el servicio no le enviamos nada, para que no de error de nombre requerido
        $response = $this->put("/api/1.0/students/$studentExist->id", []);

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
        // Hacemos el registro de un estudiante en nuestra tabla students
        $studentExist = Student::create([
            'names' => 'FEDERICO',
            'last_names' => 'PÉREZ',
            'document' => '112233',
        ]);

        // Al consumir el servicio enviamos solo el names, para que no de error de names, sino
        //error de last_name requerido
        $response = $this->put("/api/1.0/students/$studentExist->id", [
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
