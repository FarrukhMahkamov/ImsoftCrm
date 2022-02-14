<?php

namespace Database\Factories;

use App\Models\Reklama;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReklamaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Reklama::class;

    public function definition()
    {
        return [
            'description' => $this->faker->paragraph(6),
        ];
    }
}
