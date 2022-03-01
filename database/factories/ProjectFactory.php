<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Status;
use App\Models\Project;
use App\Models\Developer;
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
            'name' => $this->faker->word(),
            'from_whom' => $this->faker->name(),
            'general_info' => $this->faker->paragraph(10),
            'tech_doc' => $this->faker->paragraph(10),
            'dev_doc' =>$this->faker->paragraph(10),
            'file_doc' => $this->faker->paragraph(10),
            'status_id' => $this->faker->numberBetween(1, 5),
            'developer_id' => Developer::factory(), 
            'client_id' => Client::factory(), 
            'start_date' => $this->faker->dateTime(), 
            // 'deadline_date' => $this->faker->dateTime(),
            'finish_date' => $this->faker->dateTime(),
        ];
    }
}
