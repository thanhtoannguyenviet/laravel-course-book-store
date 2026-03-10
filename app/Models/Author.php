<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'pen_name',
        'bio',
        'birth_date',
        'nationality',
        'email',
        'avatar_url',
        'is_active',
    ];
}
