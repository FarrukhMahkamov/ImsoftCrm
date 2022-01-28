<?php

namespace Database\Factories;

use App\Models\ActivityType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = ActivityType::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'category_id' => $this->faker->randomDigit(),
        ];
    }
}
