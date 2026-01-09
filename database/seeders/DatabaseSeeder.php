<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * This creates the default admin user required by the assignment.
     */
    public function run(): void
    {
        // Create default admin account (required by the assignment)
        // Email: admin@ehb.be
        // Password: Password!321
        User::updateOrCreate(
            ['email' => 'admin@ehb.be'], // search by email first
            [
                'name' => 'admin',                 // visible name
                'password' => Hash::make('Password!321'), // hashed password
                'is_admin' => true,                // admin flag (preferred)
                'role' => 'admin',                 // optional, if you use role system
            ]
        );

       
    }
}
