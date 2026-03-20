<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Lấy danh sách categories
        $categories = Category::where('is_active', true)->get();

        // Lấy sách nổi bật (ví dụ: có stock > 0 và active)
        $featuredBooks = Book::with('author', 'category')
            ->where('is_active', true)
            ->where('stock_quantity', '>', 0)
            ->orderBy('sold_quantity', 'desc')
            ->limit(4)
            ->get();

        // Lấy sách mới nhất
        $newBooks = Book::with('author', 'category')
            ->where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        // Tìm kiếm sách nếu có query
        $searchQuery = $request->get('search');
        $searchResults = null;
        if ($searchQuery) {
            $searchResults = Book::with('author', 'category')
                ->where('is_active', true)
                ->where(function ($query) use ($searchQuery) {
                    $query->where('title', 'like', '%' . $searchQuery . '%')
                        ->orWhereHas('author', function ($q) use ($searchQuery) {
                            $q->where('full_name', 'like', '%' . $searchQuery . '%');
                        })
                        ->orWhereHas('category', function ($q) use ($searchQuery) {
                            $q->where('name', 'like', '%' . $searchQuery . '%');
                        });
                })
                ->get();
        }

        return view('welcome', compact('categories', 'featuredBooks', 'newBooks', 'searchResults', 'searchQuery'));
    }

    public function shop(Request $request)
    {
        $query = Book::with('author', 'category')->where('is_active', true);

        // Filter by category (multiple selection)
        $categories = (array) $request->input('category', []);
        if (count($categories) > 0) {
            $query->whereIn('category_id', $categories);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhereHas('author', function ($subQ) use ($search) {
                        $subQ->where('full_name', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('category', function ($subQ) use ($search) {
                        $subQ->where('name', 'like', '%' . $search . '%');
                    });
            });
        }

        // dd($query->toSql(), $query->getBindings()); // Debug SQL query and bindings
        $books = $query->paginate(12);

        $categories = Category::where('is_active', true)->get();

        return view('shop', compact('books', 'categories'));
    }

}
