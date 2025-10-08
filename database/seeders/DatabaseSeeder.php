<?php

namespace Database\Seeders;

use App\Models\User;
//use illuminate database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'first_name' => 'Berto',
            'middle_name' => 'Dee',
            'last_name' => 'Manangsala',
            'email' => 'manangsalaberto@example.com',
            'password' => Hash::make('password'),
        ]);

        $this->call(StudentSeeder::class);
    }
}
