<?php

namespace Database\Seeders;

use App\Models\Generation;
use App\Models\Grade;
use App\Models\GradeSubject;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class GradesSubjectsSeeder extends Seeder
{
    public function run(): void
    {
        $grades = Grade::all();
        $subjects = Subject::all();
        $generations = Generation::where('year', 2022)->get();

        $grades->crossJoin($subjects, $generations)->each(function ($combination) {
            list($grade, $subject, $generation) = $combination;
            GradeSubject::create([
                'grade_id' => $grade->id,
                'subject_id' => $subject->id,
                'generation_id' => $generation->id,
            ]);
        });
    }
}
