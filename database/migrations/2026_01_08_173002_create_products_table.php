<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // up() runs when we migrate (create the table)
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // Product name (example: Wireless Mouse)
            $table->string('name');

            // slug is used in the URL and must be unique
            // example: wireless-gaming-mouse
            $table->string('slug')->unique();

            // Price in cents (integer) to avoid float problems
            // 4999 means 49.99
            $table->unsignedInteger('price');

            // Optional fields
            $table->string('brand')->nullable();
            $table->string('category')->nullable();

            // Path to the image stored on the server (in storage/public)
            $table->string('image_path')->nullable();

            // Short text for the card UI
            $table->string('short_description', 220)->nullable();

            // How many items are available
            $table->unsignedInteger('stock')->default(0);

            // If true, show it on top of the list (featured)
            $table->boolean('is_featured')->default(false);

            $table->timestamps();
        });
    }

    // down() runs when we rollback (drop the table)
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
