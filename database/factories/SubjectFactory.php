<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $list = [
            'Toán',
            'Tiếng anh ',
            'Ngữ văn',
            'Sinh học',
            'Hóa',
            'Vật lý',
            'Công nghệ',
            'Địa lý',
            'Tin học',
            'Tiếng pháp'
        ];

        $name = fake()->randomElement($list);
        return [
            'name' => $name,
            'teacher_id' => fake()->numberBetween(1, 10)
        ];
    }
}
