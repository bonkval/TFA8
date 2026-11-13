<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<User> */
class UserFactory extends Factory
{
    public function unverified(): static
    {
        return $this->state(fn () => ['email_verified_at' => null]);
    }

    public function definition(): array
    {
        return [
            'username' => fake()->unique()->userName(),
            'full_name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => 'password',
            'email_verified_at' => now(),
        ];
    }
}
