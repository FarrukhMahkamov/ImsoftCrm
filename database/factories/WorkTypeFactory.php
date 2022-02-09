<?php

namespace Database\Factories;

use App\Models\WorkType;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = WorkType::class;

    public function definition()
    {
        return [
            'work_type' => $this->faker->word(),
        ];
    }
}
