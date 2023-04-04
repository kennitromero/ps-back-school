<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\GradeStudent;
use App\Models\Qualification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QualificationSeeder extends Seeder
{

    public function run(): void
    {

        $nota_mínima = 1;
        $nota_máxima = 5;

        for ($i = $nota_mínima; $i <= $nota_máxima; $i++) {
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
