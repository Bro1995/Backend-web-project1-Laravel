<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    // Fields that can be saved from the contact form
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];
}
