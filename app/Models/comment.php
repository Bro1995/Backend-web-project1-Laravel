<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Fields that can be filled via forms
    protected $fillable = [
        'body',
        'user_id',
        'news_id',
    ];

    // The user who wrote the comment
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // The news item the comment belongs to
    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
