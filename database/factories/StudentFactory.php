<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomName([
                "James", "Maria", "Daniel", "Sophia", "Michael", "Olivia", "Ethan", "Isabella",
                "William", "Ava", "Benjamin", "Mia", "Lucas", "Chloe", "Alexander", "Emily",
                "Jacob", "Amelia", "Matthew", "Charlotte", "Elijah", "Harper", "Noah", "Victoria",
                "Samuel", "Lily", "David", "Grace", "Andrew", "Aria", "Christopher", "Zoey",
                "Anthony", "Natalie", "Jonathan", "Hannah", "Joshua", "Layla", "Nathan", "Scarlett",
                "Ryan", "Ella", "Dylan", "Madison", "Gabriel", "Zoe", "Caleb", "Lucy", "Aaron", "Penelope",
            ]),
        
            'email' => $this->faker->unique()->safeEmail(),
            'contact_number' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'date_of_birth' => $this->faker->date(),
        ];
    }
}
