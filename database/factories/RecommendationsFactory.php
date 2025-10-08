<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recommendations>
 */
class RecommendationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => \App\Models\Student::factory(),
            'strand_code' => \App\Models\Learningstrand::factory(),
            'recommended_material' => $this->faker->sentence(),
            'reason' => $this->faker->paragraph(),
        ];
    }
}
