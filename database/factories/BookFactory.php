<?php

namespace Database\Factories;

use App\Models\Author;
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
            'title' => fake()->sentence(3), // Náhodný názov knihy
            'description' => fake()->paragraph, // Opis knihy
            'genre' => fake()->randomElement(['Fantasy', 'Sci-Fi', 'Romance', 'Thriller', 'Non-fiction']), // Náhodný žáner
            'author_id' => Author::inRandomOrder()->first()->id, // Náhodný autor zo zoznamu
        ];
    }
}