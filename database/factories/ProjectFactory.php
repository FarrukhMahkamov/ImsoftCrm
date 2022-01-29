<?php

namespace Database\Factories;

use App\Models\Developer;
use App\Models\Project;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Project::class;

    public function definition()
    {
        return [
            'project_name' => $this->faker->name(),
            'general_info' => $this->faker->paragraph(10),
            'general_file' => $this->faker->imageUrl($width = 500, $height = 500, $word = 'IMSOFT'),
            'status_id' => Status::factory(),
            'developer_id' => Developer::factory(),
            'developer_info' => $this->faker->paragraph(),
            'start_date' => $this->faker->dateTime(), 
            'deadline_date' => $this->faker->dateTime(), 
            'finish_date' => $this->faker->dateTime(), 
            'about_file' => $this->faker->paragraph(10),
            'project_file' => $this->faker->imageUrl($width = 500, $height = 500, $word = 'IMSOFT')
        ];
    }
}
