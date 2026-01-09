<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqItem extends Model
{
    use HasFactory;

    // Fields that can be filled via the admin form
    protected $fillable = [
        'faq_category_id',
        'question',
        'answer',
    ];

    // Category this item belongs to
    public function category()
    {
        return $this->belongsTo(FaqCategory::class, 'faq_category_id');
    }
}
