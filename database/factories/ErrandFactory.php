<?php

namespace Database\Factories;

use App\Models\errand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\errand>
 */
class ErrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->jobTitle,
            'description'=>fake()->paragraph,
            'salary' =>fake()->numberBetween(5000, 100000), // store as integer
            'phone_number'=>fake()->phoneNumber(),
            'location'=>fake()->city,
            'category'=> fake()->randomElement(errand::$category),
            'experience'=>fake()->randomElement(errand::$experience)
          

        ];
    }
}
