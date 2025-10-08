<?php

namespace Database\Seeders;

use App\Models\Learningstrand;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LearningstrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure there's at least one teacher user to reference.
        $teacher = User::first();
        if (! $teacher) {
            $teacher = User::create([
                'name' => 'Default Teacher',
                'email' => 'teacher@example.com',
                'password' => Hash::make('password'),
            ]);
        }

        $items = [
            [
                'title' => 'Fundamentals of STEM',
                'description' => 'An overview of core STEM principles and problem solving.',
                'teacher_id' => $teacher->id,
                'category' => 'STEM',
            ],
            [
                'title' => 'Applied ABM',
                'description' => 'Business and management strand focusing on entrepreneurship.',
                'teacher_id' => $teacher->id,
                'category' => 'ABM',
            ],
            [
                'title' => 'Humanities and Social Sciences',
                'description' => 'Critical thinking and social analysis.',
                'teacher_id' => $teacher->id,
                'category' => 'HUMSS',
            ],
        ];

        foreach ($items as $item) {
            Learningstrand::updateOrCreate([
                'title' => $item['title'],
            ], $item);
        }
    }
}
