<?php

namespace Database\Factories;

use App\Models\Door;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Door>
 */
class DoorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->unique()->randomNumber(4),
            'name' => 'DR-' . fake()->randomNumber(4)
        ];
    }
}
