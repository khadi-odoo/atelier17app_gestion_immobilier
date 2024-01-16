<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $option = ['piscine', 'jackousie', 'salle de bain', 'salle de travail'];

        return [
            'title' => fake()->name(),
            'description' => fake()->text(),
            'surface' =>  fake()->numberBetween(2, 10458),
            'floor' => fake()->numberBetween(0, 5),
            'price' => fake()->numberBetween(567, 679775),
            'city' => fake()->name(),
            'address' => fake()->name(),
            'postal_code' => fake()->name(),
            'sold' => fake()->boolean(),
            'image' => fake()->imageUrl(),
            'green_area' => fake()->boolean()
        ];
    }
}
