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
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->text(100),
            'cover_url' => $this->faker->optional()->imageUrl(200, 300, 'books'),
            'is_active' => $this->faker->boolean(90),
            'original_price' => $this->faker->randomFloat(2, 5, 100),
            'selling_price' => $this->faker->randomFloat(2, 5, 100),
            'stock_quantity' => $this->faker->numberBetween(0, 200),
            'sold_quantity' => $this->faker->numberBetween(0, 200),
            'author_id' => \App\Models\Author::factory(),
            'category_id' => \App\Models\Category::factory(),
        ];
    }
}
