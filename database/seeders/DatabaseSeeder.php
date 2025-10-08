<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure the default user exists without creating duplicates
        User::firstOrCreate(
            ['email' => 'manangsalaberto@example.com'],
            [
                'name' => 'Alberto Manansala',
                'password' => Hash::make('password'),
            ]
        );

        // Seed students and learning strands
        $this->call([
            StudentSeeder::class,
            LearningstrandSeeder::class,
        ]);
    }

    public function runLearningstrandSeeder(): void
    {
        $this->call(LearningstrandSeeder::class);
    }
}
