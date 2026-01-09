<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Create the news table.
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();

            // Title of the news item
            $table->string('title');

            // Main text/content of the news
            $table->text('content');

            // Optional image path
            $table->string('image')->nullable();

            // Publish date (can be null for drafts)
            $table->timestamp('published_at')->nullable();

            // Author of the news item
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Created at & updated at
            $table->timestamps();
        });
    }

    /**
     * Drop the news table.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
