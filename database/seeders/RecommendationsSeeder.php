<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recommendations;
use App\Models\Student;
use App\Models\Learningstrand;

use Faker\Factory as FakerFactory;

class RecommendationsSeeder extends Seeder
{
    
    public function run(): void
    {
        
        if (Student::count() === 0) {
            
            $this->call(StudentSeeder::class);
        }

        if (Learningstrand::count() === 0) {
           
            $this->call(LearningstrandSeeder::class);
        }

        $students = Student::pluck('id')->toArray();
        $strands = Learningstrand::all();

        if (empty($students) || $strands->isEmpty()) {
            
            return;
        }

        $faker = FakerFactory::create();

       
        $created = [];

        foreach ($students as $studentId) {
       
            $count = rand(1, 3);

            for ($i = 0; $i < $count; $i++) {
               
                $strand = $strands->random();

                $key = $studentId . ':' . $strand->id;
                if (isset($created[$key])) {
                   
                    continue;
                }

                Recommendations::create([
                    'student_id' => $studentId,
                    'strand_code' => $strand->id,
                    'recommended_material' => $faker->sentence(3) . ' — ' . $strand->title,
                    'reason' => $faker->optional()->paragraph(),
                ]);

                $created[$key] = true;
            }
        }
    }
}
