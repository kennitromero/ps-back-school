<?php

namespace Tests\Feature\app\Http\Controllers;

use App\Models\Student;
use Tests\TestCase;

class StudentControllerTest extends TestCase
{
    public function testShouldAPI10GetAllStudentsResponseSuccess(): void
    {
        $studentKennit = Student::factory()->create([
            'name' => 'Kennit'
        ]);

        $studentAbner = Student::factory()->create([
            'name' => 'Abner'
        ]);
        $response = $this->get('/api/1.0/students');

        $response->assertJson([
            "data" => [
                [
                    "id" => $studentKennit->id,
                    "document" => $studentKennit->document,
                    "names" => "Kennit",
                    "last_names" => $studentKennit->last_name,
                ],
                [
                    "id" => $studentAbner->id,
                    "document" => $studentAbner->document,
                    "names" => "Abner",
                    "last_names" => $studentAbner->last_name,
                ]
            ]
        ]);

        $response->assertStatus(200);
    }

    public function testShouldAPI10CreateStudentResponseSuccess(): void
    {
        $dataStudent = [
            "document" => '1234567',
            "name" => 'Kennit',
            "last_name" => 'Ruz',
        ];

        $response = $this->post('/api/1.0/students', $dataStudent);
        $response->assertJson([
            "document" => '1234567',
            "name" => 'Kennit',
            "last_name" => 'Ruz',
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas(Student::class, [
            "document" => '1234567',
            "name" => 'Kennit',
            "last_name" => 'Ruz',
        ]);
    }

    public function testAPI10UpdateStudent(): void
    {
        $student = Student::factory()->create();
        $dataStudent = [
            "document" => '1234567',
            "name" => 'Kennit',
            "last_name" => 'Ruz',
        ];

        $response = $this->put("/api/1.0/students/$student->document", $dataStudent);

        $response->assertJson($dataStudent);
        $response->assertStatus(200);

        $this->assertDatabaseHas(Student::class, [
            "id" => $student->id,
            "document" => '1234567',
            "name" => 'Kennit',
            "last_name" => 'Ruz',
        ]);
    }
}
