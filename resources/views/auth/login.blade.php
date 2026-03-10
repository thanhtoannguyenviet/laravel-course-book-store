@extends('layout')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <form method="POST" action="{{ route('login') }}" class="p-8 bg-white shadow-lg rounded-lg w-96">
        @csrf
        <h2 class="text-2xl font-bold mb-6 text-center">Đăng nhập</h2>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" class="w-full px-3 py-2 border rounded-md focus:ring-blue-500 border-gray-300" required>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700">Mật khẩu</label>
            <input type="password" name="password" class="w-full px-3 py-2 border rounded-md focus:ring-blue-500 border-gray-300" required>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">Đăng nhập</button>

        @if ($errors->any())
            <p class="text-red-500 text-sm mt-4">{{ $errors->first() }}</p>
        @endif
    </form>
</div>
@endsection
