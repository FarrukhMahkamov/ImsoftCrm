<?php

namespace Database\Factories;

use App\Models\Developer;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeveloperFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Developer::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'start_work' => $this->faker->dateTime(),
            'surname' => $this->faker->name(),
            'phone_number' => $this->faker->phoneNumber(),
            'work_type' => $this->faker->word(),
            'about' => $this->faker->text(),
            'file' => $this->faker->imageUrl($width = 60, $height = 60),
            'workstatus_id' => $this->faker->word()
        ];
    }
}
