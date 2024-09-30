<?php

namespace Database\Factories;

use App\Enums\ExamType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exam>
 */
class ExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = fake()->randomElement([ExamType::ORAL, ExamType::ONE_HOUR, ExamType::FIFTEEN_MINUTES, ExamType::FINAL]);
        // $coefficient = 1;
        switch ($type) {
            case ExamType::ORAL:
                $coefficient = 1;
                break;
            case ExamType::FIFTEEN_MINUTES:
                $coefficient = 1;
                break;
            case ExamType::ONE_HOUR:
                $coefficient = 2;
                break;
            case ExamType::FINAL:
                $coefficient = 3;
                break;
        }
        return [
            'student_id' => fake()->numberBetween(1, 10),
            'subject_id' => fake()->numberBetween(1, 10),
            'type' => $type,
            'score' => fake()->numberBetween(1, 10),
            'year' => fake()->randomElement([2020, 2021, 2022, 2023, 2024, 2025]),
            'coefficient' => $coefficient,
        ];
    }
}
