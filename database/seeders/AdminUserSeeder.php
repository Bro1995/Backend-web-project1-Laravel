<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    // Create one admin user for testing
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'username' => 'admin',
                'password' => Hash::make('password'),
                // Use ONE of these based on your users table:
                'role' => 'admin',
                'is_admin' => true,
            ]
        );
    }
}
