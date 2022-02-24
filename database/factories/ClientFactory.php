<?php

namespace Database\Factories;

use App\Models\ActivityType;
use App\Models\Category;
use App\Models\Client;
use App\Models\Address;
use App\Models\Developer;
use App\Models\Operator;
use App\Models\Region;
use App\Models\State;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Client::class;

    public function definition()
    {
        return [
            'general_info' => $this->faker->paragraph(12),
            'general_document' => $this->faker->paragraph(12),
            'enterprise_name' => $this->faker->name(),
            'home_address' => $this->faker->address(),
            'order_reason' => $this->faker->paragraph(),
            'client_name' => $this->faker->name(),
            'client_phone_number' => $this->faker->phoneNumber(),
            'client_phone_number_2' => $this->faker->phoneNumber(),
            'client_born_date' => $this->faker->dateTime(),
            'operator_phone_number' => $this->faker->phoneNumber(),
            'operator_phone_number_2' => $this->faker->phoneNumber(),
            'operator_born_date' => $this->faker->dateTime(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'file_1' => $this->faker->imageUrl(),
            'file_2' => $this->faker->imageUrl(),
            'file_3' => $this->faker->imageUrl(),
            'operator_name' => $this->faker->name(),
            'category_id' => Category::factory(),
            'activity_type_id' => ActivityType::factory(),
            'state_id' => State::factory(),
            'region_id' => Region::factory(),
            'address_id' => Address::factory(),
            'client_status' => $this->faker->numberBetween(1,3),
        ];
    }
}

