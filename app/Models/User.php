<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Fields that can be filled via forms
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role',
        'is_admin',
        'birthday',
        'about',
        'profile_picture',
    ];

    // Fields that should not be exposed
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Cast database fields to correct types
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birthday' => 'date',
            'is_admin' => 'boolean',
        ];
    }

    // Comments written by the user
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    // News items liked by the user
    public function likedNews(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'news_user')->withTimestamps();
    }

    // Check if the user is an admin
   public function isAdmin(): bool
           {
            return ($this->is_admin ?? false) || ($this->role ?? null) === 'admin';
            }

    // Get profile picture or fallback image
    public function getProfilePictureUrlAttribute(): string
    {
        if ($this->profile_picture && Storage::disk('public')->exists($this->profile_picture)) {
            return Storage::url($this->profile_picture);
        }

        return asset('images/default-avatar.png');
    }
}
