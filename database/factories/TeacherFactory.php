<?php

namespace Database\Factories;

use App\Models\StudentClass;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teacher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
  public function definition()
  {
    return [
      'nama_guru'         => $this->faker->name(),
      'alamat'            => $this->faker->address()
    ];
  }
}
