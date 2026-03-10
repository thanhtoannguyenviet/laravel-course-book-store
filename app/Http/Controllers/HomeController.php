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
            ->limit(8)
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

        // Filter by category
        if ($request->filled('category')) {
            $categories = is_array($request->category) ? $request->category : [$request->category];
            $query->whereIn('category_id', $categories);
        }

        // Filter by author
        if ($request->filled('author')) {
            $authors = is_array($request->author) ? $request->author : [$request->author];
            $query->whereIn('author_id', $authors);
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

        $books = $query->paginate(12);

        $categories = Category::where('is_active', true)->get();
        $authors = Author::where('is_active', true)->get();

        return view('shop', compact('books', 'categories', 'authors'));
    }
}
