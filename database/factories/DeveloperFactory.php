<?php

namespace Database\Factories;

use App\Models\Type;
use App\Models\State;
use App\Models\Region;
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
            'born_date' => $this->faker->date(),
            'phone_number' => $this->faker->phoneNumber(),
            'type_id' => Type::factory(),
            'about' => $this->faker->text(),
            'passport' => $this->faker->imageUrl($width = 640, $height = 480),
            'family' => $this->faker->imageUrl($width = 640, $height = 480),
            'developer_photo' => $this->faker->imageUrl($width = 640, $height = 480),
            'state_id' => State::factory(),
            'region_id' => Region::factory(),
            'address' => $this->faker->address(),
            'longtitude' => $this->faker->longitude(),
            'latitude' => $this->faker->latitude(),
        ];
    }
}
