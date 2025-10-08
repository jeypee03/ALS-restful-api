<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Alberto Manansala',
            'email' => 'manangsalaberto@example.com',
            'password' => Hash::make('password'),
        ]);

        $this->call(StudentSeeder::class);
    }

    public function runLearningstrandSeeder(): void
    {
        $this->call(LearningstrandSeeder::class);
    }
}
