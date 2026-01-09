<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Creates the questions/answers for each FAQ category
    public function up(): void
    {
        Schema::create('faq_items', function (Blueprint $table) {
            $table->id();

            // Link each item to a category
            $table->foreignId('faq_category_id')
                ->constrained('faq_categories')
                ->cascadeOnDelete();

            $table->string('question');
            $table->text('answer');

            $table->timestamps();
        });
    }

    // Drops the table when rolling back
    public function down(): void
    {
        Schema::dropIfExists('faq_items');
    }
};

