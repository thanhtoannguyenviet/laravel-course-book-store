<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Book extends Model
{
    // add fillable fields as needed
    protected $fillable = ['title', 'author_id', 'publisher_id', 'category_id', 'price'];

    /**
     * Book belongs to a single category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
