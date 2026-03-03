<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Category extends Model
{
    // allow mass assignment if you need it
    protected $fillable = ['name', 'description', 'cover_url', 'is_active'];

    /**
     * One category has many books.
     */
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
