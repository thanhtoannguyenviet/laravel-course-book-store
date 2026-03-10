@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Danh sách sách</h1>
    <a href="{{ route('admin.books.create') }}" class="bg-green-600 text-white px-3 py-1 rounded mb-4 inline-block">Thêm mới</a>

    @if($books->isEmpty())
        <p>Chưa có sách nào.</p>
    @else
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Title</th>
                    <th class="px-4 py-2 border">Author</th>
                    <th class="px-4 py-2 border">Category</th>
                    <th class="px-4 py-2 border">Selling Price</th>
                    <th class="px-4 py-2 border">Stock</th>
                    <th class="px-4 py-2 border">Active</th>
                    <th class="px-4 py-2 border">Created At</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td class="px-4 py-2 border">{{ $book->id }}</td>
                        <td class="px-4 py-2 border">{{ $book->title }}</td>
                        <td class="px-4 py-2 border">{{ $book->author->full_name ?? 'N/A' }}</td>
                        <td class="px-4 py-2 border">{{ $book->category->name ?? 'N/A' }}</td>
                        <td class="px-4 py-2 border">{{ number_format($book->selling_price, 0, ',', '.') }} VND</td>
                        <td class="px-4 py-2 border">{{ $book->stock_quantity }}</td>
                        <td class="px-4 py-2 border">{{ $book->is_active ? 'Yes' : 'No' }}</td>
                        <td class="px-4 py-2 border">{{ $book->created_at->format('d/m/Y') }}</td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('admin.books.show', $book) }}" class="text-blue-600 mr-2">View</a>
                            <a href="{{ route('admin.books.edit', $book) }}" class="text-yellow-600 mr-2">Edit</a>
                            <form action="{{ route('admin.books.destroy', $book) }}" method="POST" class="inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sách này?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
