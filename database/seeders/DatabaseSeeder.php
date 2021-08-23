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
       // membuat 10 guru masing masing mempunyai 1 kelas
       Teacher::factory()->has(StudentClass::factory())->count(100)->create();
       Student::factory()->has(StudentClass::factory())->count(100)->create();
       Major::factory()->has(StudentClass::factory())->count(100)->create();
    }
}
