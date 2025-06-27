<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6, true),
            'description' => $this->faker->paragraph(3, true),
            'image' => 'images/default.jpg',
            'author_id' => $this->faker->numberBetween(5,6),
            "category_id" =>  $this->faker->numberBetween(1,7),
        ];
    }
}
