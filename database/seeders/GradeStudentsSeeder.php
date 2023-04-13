<?php

namespace Database\Seeders;

use App\Models\Generation;
use App\Models\Grade;
use App\Models\GradeStudent;
use App\Models\Student;
use Illuminate\Database\Seeder;

class GradeStudentsSeeder extends Seeder
{
    public function run(): void
    {
        $max_group = 5;

        for ($i = 1; $i <= $max_group; $i++) {
            $grade = Grade::inRandomOrder()->first();
            $student = Student::inRandomOrder()->first();;
            $generation = Generation::inRandomOrder()->first();

            GradeStudent::create([
                'group' => $i,
                'grade_id' => $grade->id,
                'student_id' => $student->id,
                'generation_id' => $generation->id
            ]);
        }
    }
}
