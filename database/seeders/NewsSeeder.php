<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\User;

class NewsSeeder extends Seeder
{
    // Adds demo news posts so /news and /news/1 works
    public function run(): void
    {
        $user = User::query()->first();

        // If no user exists, stop here (seed user first)
        if (!$user) {
            return;
        }

        News::create([
            'title' => 'Welcome to TechStore',
            'content' => 'This is our first news post. New products are coming soon.',
            'published_at' => now(),
            'user_id' => $user->id,
        ]);

        News::create([
            'title' => 'New Accessories Available',
            'content' => 'We added new keyboards, mice, and headsets to the shop.',
            'published_at' => now()->subDay(),
            'user_id' => $user->id,
        ]);
    }
}
