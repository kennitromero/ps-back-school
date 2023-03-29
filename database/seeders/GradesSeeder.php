<?php

namespace Database\Seeders;

use \App\Models\Grade;
use Illuminate\Database\Seeder;

class GradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <= 11; $i++) {
            Grade::create([
                'grade'=> $i
            ]);
        }
    }
}
