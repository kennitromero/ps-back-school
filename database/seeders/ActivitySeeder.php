<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Activity;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Activity::factory(20)->create();

        Activity::create([
            'grade_subject_id' => $grade_subject-> id,
            'generation_id'=>$generation->id,
            'percentage' => 70,
            'date_end' => 29-03-23
        ]);
    }
}
