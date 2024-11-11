<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'bio' => $this->faker->paragraph,
            'date_of_birth' => $this->faker->date(),
            'nationality' => $this->faker->country,
            'img_url' => $this->faker->imageUrl(640, 480, 'authors', true, 'Faker')
        ];
    }
}
