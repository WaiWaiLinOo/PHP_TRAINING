<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'name' => $this->faker->sentence,
            'email' => $this->faker->paragraph,
            'major_id' => rand(1, 5),
            'course' => $this->faker->sentence,
            ];
    }
}
