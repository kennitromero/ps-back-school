<?php

namespace Database\Seeders;

use App\Models\Generation;
use App\Models\Grade;
use App\Models\GradeStudent;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeStudentsSeeder extends Seeder
{
    public function run(): void
    {
        $generation = Generation::inRandomOrder()->first();

        $max_group = 20;
        for ($i = 1; $i <= $max_group; $i++) {
            $grade = Grade::inRandomOrder()->first();
            $student = Student::inRandomOrder()->first();;

            GradeStudent::create([
                'group' => $i,
                'grade_id'=>$grade->id,
                'student_id'=>$student->id,
                'generation_id'=>$generation->id
            ]);
        }

        $generation = Generation::inRandomOrder()->first();

        for ($i = 1; $i <= $max_group; $i++) {
            $grade = Grade::inRandomOrder()->first();
            $student = Student::inRandomOrder()->first();;

            GradeStudent::create([
                'group' => $i,
                'grade_id'=>$grade->id,
                'student_id'=>$student->id,
                'generation_id'=>$generation->id
            ]);
        }
    }
}
