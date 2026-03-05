@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Danh sách tác giả</h1>
    <a href="{{ route('authors.create') }}" class="bg-green-600 text-white px-3 py-1 rounded mb-4 inline-block">Thêm mới</a>

    @if($authors->isEmpty())
        <p>Chưa có tác giả nào.</p>
    @else
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Full Name</th>
                    <th class="px-4 py-2 border">Pen Name</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">Nationality</th>
                    <th class="px-4 py-2 border">Birth Date</th>
                    <th class="px-4 py-2 border">Active</th>
                </tr>
            </thead>
            <tbody>
                @foreach($authors as $author)
                    <tr>
                        <td class="px-4 py-2 border">{{ $author->id }}</td>
                        <td class="px-4 py-2 border">{{ $author->full_name }}</td>
                        <td class="px-4 py-2 border">{{ $author->pen_name }}</td>
                        <td class="px-4 py-2 border">{{ $author->email }}</td>
                        <td class="px-4 py-2 border">{{ $author->nationality }}</td>
                        <td class="px-4 py-2 border">{{ $author->birth_date }}</td>
                        <td class="px-4 py-2 border">{{ $author->is_active ? 'Yes' : 'No' }}</td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('authors.show', $author) }}" class="text-blue-600">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
