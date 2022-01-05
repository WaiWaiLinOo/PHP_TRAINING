<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Major;
use App\Models\Student;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Student::factory()->count(5)->create();
        Major::factory()->create([
            "name" => "IT",
          
            ]);
        Major::factory()->create([
            "name" => "EC",
         ]);
    }
}
