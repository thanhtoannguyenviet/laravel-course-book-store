@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Chi tiết người dùng</h1>

    <div class="bg-white p-6 rounded border">
        <div class="mb-4">
            <label class="font-semibold">ID:</label>
            <p>{{ $user->id }}</p>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Name:</label>
            <p>{{ $user->name }}</p>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Email:</label>
            <p>{{ $user->email }}</p>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Created At:</label>
            <p>{{ $user->created_at->format('d/m/Y H:i:s') }}</p>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Updated At:</label>
            <p>{{ $user->updated_at->format('d/m/Y H:i:s') }}</p>
        </div>

        <div>
            <a href="{{ route('admin.users.edit', $user) }}" class="bg-yellow-600 text-white px-4 py-2 rounded mr-2">Edit</a>
            <a href="{{ route('admin.users.index') }}" class="text-gray-600">Back to List</a>
        </div>
    </div>
</div>
@endsection
