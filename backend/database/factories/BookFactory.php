<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Book;

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
            'title' => $this->faker->sentence, 
            'author_id' =>  Author::pluck('id')->random(), 
            'publisher_id' =>  Publisher::pluck('id')->random(), 
            'published_year' => $this->faker->year, 
            'genre' => $this->faker->word, 
            'price' => $this->faker->randomFloat(2, 10, 100), 
            'stock' => $this->faker->numberBetween(1, 50), 
            'description' => $this->faker->paragraph, 
        ];
    }
}
