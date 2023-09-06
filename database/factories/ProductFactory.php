<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            // price like 10000 or 500000
            'price' => $this->faker->randomNumber(5),
            'stock' => $this->faker->randomNumber(2),
            'description' => $this->faker->text(200),
        ];
    }
}
