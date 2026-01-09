<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    use HasFactory;

    // Category name
    protected $fillable = ['name'];

    // FAQ items under this category
    public function items()
    {
        return $this->hasMany(FaqItem::class);
    }
}
