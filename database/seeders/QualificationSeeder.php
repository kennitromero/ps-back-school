<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\GradeStudent;
use App\Models\Qualification;
use Illuminate\Database\Seeder;

class QualificationSeeder extends Seeder
{
    public function run(): void
    {
        $notaMinima = 1;
        $notaMaxima = 5;

        for ($i = $notaMinima; $i <= $notaMaxima; $i++) {
            $activity = Activity::inRandomOrder()->first();
            $grade_student = GradeStudent::inRandomOrder()->first();
            Qualification::create([
                'note' => $i,
                'activity_id' => $activity->id,
                'grade_student_id' => $grade_student->id,
            ]);
        }
    }
}
