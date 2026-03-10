@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Chi tiết danh mục</h1>

    <div class="bg-white p-6 rounded border">
        <div class="mb-4">
            <label class="font-semibold">ID:</label>
            <p>{{ $category->id }}</p>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Name:</label>
            <p>{{ $category->name }}</p>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Description:</label>
            <p>{{ $category->description }}</p>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Cover URL:</label>
            <p>{{ $category->cover_url }}</p>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Is Active:</label>
            <p>{{ $category->is_active ? 'Yes' : 'No' }}</p>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Created At:</label>
            <p>{{ $category->created_at->format('d/m/Y H:i:s') }}</p>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Updated At:</label>
            <p>{{ $category->updated_at->format('d/m/Y H:i:s') }}</p>
        </div>

        <div>
            <a href="{{ route('admin.categories.edit', $category) }}" class="bg-yellow-600 text-white px-4 py-2 rounded mr-2">Edit</a>
            <a href="{{ route('admin.categories.index') }}" class="text-gray-600">Back to List</a>
        </div>
    </div>
</div>
@endsection
