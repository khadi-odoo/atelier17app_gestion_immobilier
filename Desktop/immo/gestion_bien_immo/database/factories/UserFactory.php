<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $roles = ['admin', 'user', 'manager'];
        return [
            'name' => fake()->name(),
            'first_name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => 'password',
            'remember_token' => Str::random(10),
            'role' => $roles[mt_rand(0,2)],
        ];
    }

    public function admin() : UserFactory
    {

     return $this->state([
         'name' => $this->faker->name,
         'first_name' => $this->faker->firstName,
         'email' => 'admin@admin.com',
         'email_verified_at' => now(),
         'remember_token' => Str::random(10),
         'role' => 'admin',
         'password' => Hash::make('password'),
     ]);

    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
