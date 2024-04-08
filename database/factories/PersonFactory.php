<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       $faker = \Faker\Factory::create();
        return [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'password' => $faker->password,
            'random_date' => $faker -> date(),
            'status' => $faker -> boolean,
            'photo' => $faker -> imageUrl()
        ];
    }
}
