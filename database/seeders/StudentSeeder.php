<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::factory()->count(50)->create();
}
    }