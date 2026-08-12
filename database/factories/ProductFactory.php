<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
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
            'image' => 'no-image.jpg',
            // Membangkitkan 3 kata acak untuk judul
            'title' => fake()->words(3, true),
            // Membangkitkan paragraf acak
            'description' => fake()->paragraph(),
            // Harga acak antara 10.000 sampai 500.000
            'price' => fake()->numberBetween(10000, 500000),
            // Stok acak antara 0 sampai 100
            'stock' => fake()->numberBetween(0, 100),
        ];
    }
}
