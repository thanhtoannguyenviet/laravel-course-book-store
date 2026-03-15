@extends('layout')

@section('content')

<!-- Search + Filters -->
<section class="px-4 py-4">
    <form method="GET" action="{{ route('shop') }}">
        <div class="relative flex items-center">
            <span class="material-symbols-outlined absolute left-4 text-slate-400">search</span>
            <input class="w-full pl-12 pr-4 py-3 bg-white dark:bg-slate-800 border-none rounded-xl shadow-sm focus:ring-2 focus:ring-primary text-sm"
                placeholder="Search books, authors, genres..." type="text" name="search" value="{{ request('search') }}" />
        </div>

        <div class="mt-4 flex flex-wrap gap-2">
            @foreach($categories as $category)
                @php
                    $selectedCategories = (array) request('category', []);
                    $isActive = in_array($category->id, $selectedCategories);

                    if ($isActive) {
                        // Remove this category from selection
                        $newCategories = array_diff($selectedCategories, [$category->id]);
                    } else {
                        // Add this category to selection
                        $newCategories = array_merge($selectedCategories, [$category->id]);
                    }

                    $query = array_merge(request()->except('page'), ['category' => $newCategories]);
                    // Remove empty category array
                    if (empty($newCategories)) {
                        unset($query['category']);
                    }
                @endphp

                <a href="{{ route('shop', $query) }}"
                    class="flex items-center px-4 py-2 rounded-full text-sm font-medium shadow-sm transition-colors {{ $isActive ? 'bg-primary text-white' : 'bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-400' }}">
                    {{ $category->name }}
                </a>
            @endforeach

            @if(request()->has('category'))
                <a href="{{ route('shop', request()->except('category', 'page')) }}" class="flex items-center px-4 py-2 rounded-full text-sm font-medium text-primary border border-primary">
                    Clear filter
                </a>
            @endif
        </div>
    </form>
</section>

<!-- Books Grid -->
<section class="px-4 pb-8">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-bold tracking-tight">Books</h3>
        @if(request('search'))
            <p class="text-sm text-slate-500">Search results for "{{ request('search') }}"</p>
        @endif
    </div>

    @if($books->isEmpty())
        <p class="text-slate-500">No books found.</p>
    @else
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($books as $book)
                <div class="bg-white dark:bg-slate-800 rounded-xl p-4 shadow-lg flex flex-col gap-3 hover:shadow-xl transition-shadow">
                    <div class="aspect-[3/4] w-full rounded-lg overflow-hidden bg-slate-100 mb-2">
                        @if($book->cover_url)
                            <img class="w-full h-full object-contain" data-alt="{{ $book->title }} book cover" src="{{ $book->cover_url }}" />
                        @else
                            <div class="w-full h-full bg-slate-200 flex items-center justify-center">
                                <span class="material-symbols-outlined text-slate-400">auto_stories</span>
                            </div>
                        @endif
                    </div>
                    <div class="flex flex-col gap-1">
                        <h4 class="text-sm font-bold line-clamp-1">{{ $book->title }}</h4>
                        <p class="text-xs text-slate-500 dark:text-slate-400">{{ $book->author->full_name ?? 'Unknown' }}</p>
                        <div class="flex items-center justify-between mt-1">
                            <span class="text-sm font-bold text-primary">{{ number_format($book->selling_price, 0, ',', '.') }}VND</span>
                            <button class="p-1 rounded-full bg-primary/10 text-primary">
                                <span class="material-symbols-outlined text-[18px]">add_shopping_cart</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $books->withQueryString()->links() }}
        </div>
    @endif
</section>

@endsection
