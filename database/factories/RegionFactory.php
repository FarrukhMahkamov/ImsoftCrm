<?php

namespace Database\Factories;

use App\Models\Region;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Region::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'state_id' => State::factory()
        ];
    }
}
