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

    public function definition(): array
    {
       return [
        'name' => fake()->name(),
        'username' => fake()->unique()->userName(),
        'email' => fake()->unique()->safeEmail(),
        'email_verified_at' => now(),
        'password' => static::$password ??= \Illuminate\Support\Facades\Hash::make('password'),
        'role' => 'user',
        'is_admin' => false,
        'birthday' => fake()->optional()->date(),
        'about' => fake()->optional()->paragraph(),
        'profile_picture' => null,
        'remember_token' => \Illuminate\Support\Str::random(10),
          ];
    }

    // Quick helper to create an admin user
    public function admin(): static
    {
        return $this->state(fn () => [
            'role' => 'admin',
            'is_admin' => true,
        ]);
    }

    public function unverified(): static
    {
        return $this->state(fn () => [
            'email_verified_at' => null,
        ]);
    }
}
