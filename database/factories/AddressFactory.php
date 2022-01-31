<?php

namespace Database\Factories;

use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'region_id' => Region::factory()
        ];
    }
}
