<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Book extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    // add fillable fields as needed
    protected $fillable = ['title', 'description', 'cover_url', 'is_active', 'original_price', 'selling_price', 'stock_quantity', 'sold_quantity', 'author_id', 'category_id'];

    /**
     * Book belongs to a single category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Book belongs to an author.
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
