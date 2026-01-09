<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Create the users table with the fields used in the project
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // Basic account fields
            $table->string('name');
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            // Role / permissions
            $table->string('role')->default('user');   // user or admin
            $table->boolean('is_admin')->default(false);

            // Profile fields
            $table->date('birthday')->nullable();
            $table->text('about')->nullable();
            $table->string('profile_picture')->nullable(); // path in storage/app/public

            $table->timestamps();
        });
    }

    // Drop the users table on rollback
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
