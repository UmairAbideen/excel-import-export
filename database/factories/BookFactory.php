<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'author' => $this->faker->name,
            'release_date' => $this->faker->date(),
            'genre' => $this->faker->word,
            'pages' => $this->faker->numberBetween(100, 1000),
            'publisher' => $this->faker->company,
        ];
    }
}
