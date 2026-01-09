<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Create the comments table.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            // The news item this comment belongs to
            $table->foreignId('news_id')
                ->constrained('news')
                ->cascadeOnDelete();

            // The user who wrote the comment
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Comment text
            $table->text('body');

            $table->timestamps();
        });
    }

    /**
     * Drop the comments table.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
