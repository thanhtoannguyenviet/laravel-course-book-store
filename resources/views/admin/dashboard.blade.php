@extends("layouts.admin")

@section("content")
<div class="min-h-screen bg-gray-50">
    <nav class="bg-white shadow-sm p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-gray-800">My Dashboard</h1>
        <div class="flex items-center gap-4">
            <span>Chào, **{{ Auth::user()->name }}**</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="text-sm bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Đăng xuất</button>
            </form>
        </div>
    </nav>

    <main class="p-8">
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold mb-4">Thống kê tổng quan</h2>
            <div class="grid grid-cols-3 gap-4">
                <div class="p-4 bg-blue-100 rounded-md">Users: 1,234</div>
                <div class="p-4 bg-green-100 rounded-md">Sales: $5,678</div>
                <div class="p-4 bg-purple-100 rounded-md">Orders: 89</div>
            </div>
        </div>
    </main>
</div>
@endsection
