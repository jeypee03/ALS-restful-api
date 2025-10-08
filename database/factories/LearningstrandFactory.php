<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Learningstrand>
 */
class LearningstrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'teacher_id' => $this->faker->numberBetween(1, 10),
            'category' => $this->faker->randomElement(['Math', 'Science', 'History', 'Language Arts']),
        ];
    }
}
