<?php

namespace Database\Factories;

use App\Models\Developer;
use App\Models\WorkType;
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
            'born_date' => $this->faker->dateTime(),
            'phone_number' => $this->faker->phoneNumber(),
            'work_type_id' => WorkType::factory(),
            'about' => $this->faker->text(),
            'family' => $this->faker->imageUrl($width = 60, $height = 60),
            'passport' => $this->faker->imageUrl($width = 60, $height = 60),
            'developer_photo' => $this->faker->imageUrl($width = 60, $height = 60),
        ];
    }
}
