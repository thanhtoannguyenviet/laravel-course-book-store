<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex min-h-screen">
        <aside class="w-64 bg-slate-800 text-white flex-shrink-0">
            <div class="p-6 text-2xl font-bold border-b border-slate-700">My Admin</div>
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center py-3 px-6 hover:bg-slate-700 {{ request()->routeIs('admin.dashboard') ? 'bg-slate-700 border-l-4 border-blue-500' : '' }}">
                    <i class="fas fa-home mr-3"></i> Dashboard
                </a>
                <a href="{{ route('admin.authors.index') }}" class="flex items-center py-3 px-6 hover:bg-slate-700 {{ request()->routeIs('admin.authors.*') ? 'bg-slate-700 border-l-4 border-blue-500' : '' }}">
                    <i class="fas fa-users mr-3"></i> Quản lý Tác giả
                </a>
                <a href="#" class="flex items-center py-3 px-6 hover:bg-slate-700 text-gray-400">
                    <i class="fas fa-cog mr-3"></i> Cài đặt
                </a>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col">
            <header class="bg-white shadow-sm h-16 flex items-center justify-between px-8">
                <h2 class="text-xl font-semibold text-gray-800">@yield('header_title')</h2>
                <div class="flex items-center gap-4">
                    <span class="text-gray-600">Admin: **{{ Auth::user()->name }}**</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="bg-red-50 text-red-600 px-4 py-2 rounded-lg hover:bg-red-100 transition">Thoát</button>
                    </form>
                </div>
            </header>

            <main class="p-8">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
