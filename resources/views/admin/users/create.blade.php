@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Thêm người dùng mới</h1>

    <form action="{{ route('admin.users.store') }}" method="post">
        @csrf

        <div class="mb-2">
            <label class="block">Name *</label>
            <input type="text" name="name" value="{{ old('name') }}" class="border p-1 w-full" required>
            @error('name')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mb-2">
            <label class="block">Email *</label>
            <input type="email" name="email" value="{{ old('email') }}" class="border p-1 w-full" required>
            @error('email')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mb-2">
            <label class="block">Password *</label>
            <input type="password" name="password" class="border p-1 w-full" required>
            @error('password')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mb-2">
            <label class="block">Confirm Password *</label>
            <input type="password" name="password_confirmation" class="border p-1 w-full" required>
            @error('password_confirmation')<p class="text-red-600">{{ $message }}</p>@enderror
        </div>

        <div>
            <button class="bg-blue-600 text-white px-4 py-2">Create</button>
            <a href="{{ route('admin.users.index') }}" class="ml-2 text-gray-600">Cancel</a>
        </div>
    </form>
</div>
@endsection
