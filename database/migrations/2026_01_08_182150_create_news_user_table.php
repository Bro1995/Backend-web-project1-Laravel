<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Create pivot table for news likes.
     */
    public function up(): void
    {
        Schema::create('news_user', function (Blueprint $table) {
            $table->id();

            // Reference to users table
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Reference to news table
            $table->foreignId('news_id')
                ->constrained('news')
                ->cascadeOnDelete();

            // Prevent duplicate likes
            $table->unique(['user_id', 'news_id']);

            $table->timestamps();
        });
    }

    /**
     * Drop the news_user table.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_user');
    }
};
