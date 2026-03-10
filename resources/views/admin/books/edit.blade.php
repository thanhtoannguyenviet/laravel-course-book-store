@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Chỉnh sửa sách</h1>

    <form action="{{ route('admin.books.update', $book) }}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-2">
            <label class="block">Title *</label>
            <input type="text" name="title" value="{{ old('title', $book->title) }}" class="border p-1 w-full" required>
            @error('title')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mb-2">
            <label class="block">Description</label>
            <textarea name="description" class="border p-1 w-full">{{ old('description', $book->description) }}</textarea>
            @error('description')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mb-2">
            <label class="block">Cover URL</label>
            <input type="url" name="cover_url" value="{{ old('cover_url', $book->cover_url) }}" class="border p-1 w-full">
            @error('cover_url')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mb-2">
            <label class="block">Original Price *</label>
            <input type="number" step="0.01" name="original_price" value="{{ old('original_price', $book->original_price) }}" class="border p-1 w-full" required>
            @error('original_price')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mb-2">
            <label class="block">Selling Price *</label>
            <input type="number" step="0.01" name="selling_price" value="{{ old('selling_price', $book->selling_price) }}" class="border p-1 w-full" required>
            @error('selling_price')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mb-2">
            <label class="block">Stock Quantity *</label>
            <input type="number" name="stock_quantity" value="{{ old('stock_quantity', $book->stock_quantity) }}" class="border p-1 w-full" required>
            @error('stock_quantity')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mb-2">
            <label class="block">Sold Quantity *</label>
            <input type="number" name="sold_quantity" value="{{ old('sold_quantity', $book->sold_quantity) }}" class="border p-1 w-full" required>
            @error('sold_quantity')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mb-2">
            <label class="block">Author *</label>
            <select name="author_id" class="border p-1 w-full" required>
                <option value="">Chọn tác giả</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>{{ $author->full_name }}</option>
                @endforeach
            </select>
            @error('author_id')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mb-2">
            <label class="block">Category *</label>
            <select name="category_id" class="border p-1 w-full" required>
                <option value="">Chọn danh mục</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mb-2">
            <label class="block">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $book->is_active) ? 'checked' : '' }}>
                Is Active
            </label>
            @error('is_active')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>

        <div>
            <button class="bg-blue-600 text-white px-4 py-2">Update</button>
            <a href="{{ route('admin.books.index') }}" class="ml-2 text-gray-600">Cancel</a>
        </div>
    </form>
</div>
@endsection
