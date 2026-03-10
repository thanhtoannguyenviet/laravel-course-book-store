@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Danh sách danh mục</h1>
    <a href="{{ route('admin.categories.create') }}" class="bg-green-600 text-white px-3 py-1 rounded mb-4 inline-block">Thêm mới</a>

    @if($categories->isEmpty())
        <p>Chưa có danh mục nào.</p>
    @else
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Description</th>
                    <th class="px-4 py-2 border">Active</th>
                    <th class="px-4 py-2 border">Created At</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td class="px-4 py-2 border">{{ $category->id }}</td>
                        <td class="px-4 py-2 border">{{ $category->name }}</td>
                        <td class="px-4 py-2 border">{{ $category->description }}</td>
                        <td class="px-4 py-2 border">{{ $category->is_active ? 'Yes' : 'No' }}</td>
                        <td class="px-4 py-2 border">{{ $category->created_at->format('d/m/Y') }}</td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('admin.categories.show', $category) }}" class="text-blue-600 mr-2">View</a>
                            <a href="{{ route('admin.categories.edit', $category) }}" class="text-yellow-600 mr-2">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">
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
