<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // This tells Laravel which columns we allow to be saved using create() or update()
    // It helps protect app from saving unexpected fields
    protected $fillable = [
        'name',
        'slug',
        'price',
        'brand',
        'category',
        'image_path',
        'short_description',
        'stock',
        'is_featured',
    ];



       /**
     * This tells Laravel which column to use for route model binding.
     * Now /products/{product} will search by slug instead of id.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}

