@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Chi tiết sách</h1>

    <div class="bg-white p-6 rounded border">
        <div class="mb-4">
            <label class="font-semibold">ID:</label>
            <p>{{ $book->id }}</p>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Title:</label>
            <p>{{ $book->title }}</p>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Description:</label>
            <p>{{ $book->description }}</p>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Cover URL:</label>
            <p>{{ $book->cover_url }}</p>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Original Price:</label>
            <p>{{ number_format($book->original_price, 0, ',', '.') }} VND</p>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Selling Price:</label>
            <p>{{ number_format($book->selling_price, 0, ',', '.') }} VND</p>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Stock Quantity:</label>
            <p>{{ $book->stock_quantity }}</p>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Sold Quantity:</label>
            <p>{{ $book->sold_quantity }}</p>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Author:</label>
            <p>{{ $book->author->full_name ?? 'N/A' }}</p>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Category:</label>
            <p>{{ $book->category->name ?? 'N/A' }}</p>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Is Active:</label>
            <p>{{ $book->is_active ? 'Yes' : 'No' }}</p>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Created At:</label>
            <p>{{ $book->created_at->format('d/m/Y H:i:s') }}</p>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Updated At:</label>
            <p>{{ $book->updated_at->format('d/m/Y H:i:s') }}</p>
        </div>

        <div>
            <a href="{{ route('admin.books.edit', $book) }}" class="bg-yellow-600 text-white px-4 py-2 rounded mr-2">Edit</a>
            <a href="{{ route('admin.books.index') }}" class="text-gray-600">Back to List</a>
        </div>
    </div>
</div>
@endsection
