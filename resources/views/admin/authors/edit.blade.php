@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Chỉnh sửa tác giả</h1>

    <form action="{{ route('admin.authors.update', $author) }}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-2">
            <label class="block">Full name</label>
            <input type="text" name="full_name" value="{{ old('full_name', $author->full_name) }}" class="border p-1 w-full">
            @error('full_name')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mb-2">
            <label class="block">Pen name *</label>
            <input type="text" name="pen_name" value="{{ old('pen_name', $author->pen_name) }}" class="border p-1 w-full" required>
            @error('pen_name')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mb-2">
            <label class="block">Email *</label>
            <input type="email" name="email" value="{{ old('email', $author->email) }}" class="border p-1 w-full" required>
            @error('email')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mb-2">
            <label class="block">Birth date</label>
            <input type="date" name="birth_date" value="{{ old('birth_date', $author->birth_date) }}" class="border p-1 w-full">
            @error('birth_date')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mb-2">
            <label class="block">Nationality</label>
            <input type="text" name="nationality" value="{{ old('nationality', $author->nationality) }}" class="border p-1 w-full">
            @error('nationality')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mb-2">
            <label class="block">Bio *</label>
            <textarea name="bio" class="border p-1 w-full" required>{{ old('bio', $author->bio) }}</textarea>
            @error('bio')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mb-2">
            <label class="block">Avatar URL</label>
            <input type="url" name="avatar_url" value="{{ old('avatar_url', $author->avatar_url) }}" class="border p-1 w-full">
            @error('avatar_url')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mb-2">
            <label class="block">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $author->is_active) ? 'checked' : '' }}>
                Is Active
            </label>
            @error('is_active')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>

        <div>
            <button class="bg-blue-600 text-white px-4 py-2">Update</button>
            <a href="{{ route('admin.authors.index') }}" class="ml-2 text-gray-600">Cancel</a>
        </div>
    </form>
</div>
@endsection
