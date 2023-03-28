<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;


class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        \App\Models\Student::factory(20)->create();
    }
    
}
