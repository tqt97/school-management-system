<?php

namespace Database\Factories;

use App\Enums\SchoolLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\School>
 */
class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->name(),
            'level' => fake()->randomElement([SchoolLevel::PRIMARY, SchoolLevel::SECONDARY, SchoolLevel::HIGHER])
        ];
    }
}
