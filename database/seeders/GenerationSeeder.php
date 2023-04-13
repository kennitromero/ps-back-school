<?php

namespace Database\Seeders;

use App\Models\Generation;
use Illuminate\Database\Seeder;

class GenerationSeeder extends Seeder
{
    public function run(): void
    {

        $max_year = 2030;
        for ($i = 2022; $i <= $max_year; $i++) {
            Generation::create([
                'year'=>$i
            ]);
        }
    }
}
