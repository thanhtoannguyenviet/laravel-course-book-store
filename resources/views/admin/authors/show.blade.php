@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Thông tin tác giả</h1>

    <div class="border p-4 bg-white">
        <p><strong>ID:</strong> {{ $author->id }}</p>
        <p><strong>Full name:</strong> {{ $author->full_name ?? '-' }}</p>
        <p><strong>Pen name:</strong> {{ $author->pen_name }}</p>
        <p><strong>Email:</strong> {{ $author->email }}</p>
        <p><strong>Birth date:</strong> {{ $author->birth_date }}</p>
        <p><strong>Nationality:</strong> {{ $author->nationality }}</p>
        <p><strong>Bio:</strong> {{ $author->bio }}</p>
        <p><strong>Avatar:</strong>
            @if($author->avatar_url)
                <img src="{{ $author->avatar_url }}" alt="avatar" class="h-24">
            @else
                (empty)
            @endif
        </p>
        <p><strong>Active:</strong> {{ $author->is_active ? 'Yes' : 'No' }}</p>
    </div>

    <a href="{{ route('authors.index') }}" class="inline-block mt-4 text-blue-600">Back to list</a>
</div>

@endsection
