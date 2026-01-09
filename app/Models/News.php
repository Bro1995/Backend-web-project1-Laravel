<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class News extends Model
{
    use HasFactory;

    // Fields that can be filled via forms
    protected $fillable = [
        'title',
        'content',
        'image',
        'published_at',
        'user_id',
    ];

    // Cast published_at to a date/time object
    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    // The author of the news item
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Comments posted on this news item
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    // Users who liked this news item
    public function likedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'news_user')->withTimestamps();
    }
}
