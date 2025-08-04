<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NewsArticle>
 */
class NewsArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'summary' => fake()->paragraph(),
            'image' => "articles/5cB100cywQp1Az4MiPUq2IVZ5ZjTgRUCCsTIo6rS.jpg",
        ];
    }
}
