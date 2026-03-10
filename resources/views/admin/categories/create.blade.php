@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Thêm danh mục mới</h1>

    <form action="{{ route('admin.categories.store') }}" method="post">
        @csrf

        <div class="mb-2">
            <label class="block">Name *</label>
            <input type="text" name="name" value="{{ old('name') }}" class="border p-1 w-full" required>
            @error('name')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mb-2">
            <label class="block">Description</label>
            <textarea name="description" class="border p-1 w-full">{{ old('description') }}</textarea>
            @error('description')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mb-2">
            <label class="block">Cover URL</label>
            <input type="url" name="cover_url" value="{{ old('cover_url') }}" class="border p-1 w-full">
            @error('cover_url')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mb-2">
            <label class="block">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}>
                Is Active
            </label>
            @error('is_active')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>

        <div>
            <button class="bg-blue-600 text-white px-4 py-2">Create</button>
            <a href="{{ route('admin.categories.index') }}" class="ml-2 text-gray-600">Cancel</a>
        </div>
    </form>
</div>
@endsection
