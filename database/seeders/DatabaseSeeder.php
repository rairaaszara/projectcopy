<?php

namespace Database\Seeders;

use App\Models\StudentClass;
use App\Models\Teacher;
use App\Models\Major;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        Teacher::factory(10)->create();
        Student::factory(10)->create();
        Major::factory(10)->create();
        StudentClass::factory(10)->create();
    }
}
