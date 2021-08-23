<?php

namespace Database\Factories;

use App\Models\Major;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\StudentClass;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentClassFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StudentClass::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'nama_kelas' => $this->faker->name(),
            'teacher_id' => Teacher::factory(),
            'student_id' => Student::factory(),
            'major_id' => Major::factory()
            

        ];
    }
}
