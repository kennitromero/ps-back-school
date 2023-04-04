<?php

namespace Database\Seeders;

use App\Models\GradeSubject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Activity;
use \App\Models\GradeStudent;

class ActivitySeeder extends Seeder
{

    public function run(): void
    {
        $gradeSubject = GradeSubject::first();
        Activity::factory()->count(30)->create([
            'grade_subject_id' => $gradeSubject->id,
        ]);
    }
}


