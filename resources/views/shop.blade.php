@extends('layout')

@section('content')
<!-- Search Section -->
<section class="px-4 py-2">
<form method="GET" action="{{ route('shop') }}">
<div class="relative flex items-center">
<span class="material-symbols-outlined absolute left-4 text-slate-400">search</span>
<input class="w-full pl-12 pr-4 py-3 bg-white dark:bg-slate-800 border-none rounded-xl shadow-sm focus:ring-2 focus:ring-primary text-sm" placeholder="Search books, authors, genres..." type="text" name="search" value="{{ request('search') }}"/>
</div>
</form>
</section>

<!-- Main Content -->
<div class="flex">
<!-- Sidebar Filters -->
<aside class="w-64 bg-white dark:bg-slate-800 p-4 min-h-screen">
<h3 class="text-lg font-bold mb-4">Filters</h3>

<!-- Categories Filter -->
<div class="mb-6">
<h4 class="font-semibold mb-2">Categories</h4>
<div class="space-y-2 max-h-[30vh] overflow-y-auto">
@foreach($categories as $category)
<label class="flex items-center">
<input type="checkbox" name="category[]" class="category-filter" value="{{ $category->id }}" {{ in_array($category->id, (array) request('category', [])) ? 'checked' : '' }}>
<span class="ml-2">{{ $category->name }}</span>
</label>
@endforeach
</div>
</div>



<button id="apply-filters" class="w-full bg-primary text-white py-2 rounded-lg">Apply Filters</button>
<button id="clear-filters" class="w-full bg-gray-500 text-white py-2 rounded-lg mt-2">Clear Filters</button>
</aside>

<!-- Books Grid -->
<main class="flex-1 p-4 ml-64">
<div class="flex items-center justify-between mb-4">
<h2 class="text-2xl font-bold">All Books</h2>
<span class="text-sm text-slate-500">{{ $books->total() }} books found</span>
</div>

@if($books->isEmpty())
<div class="text-center py-12">
<p class="text-slate-500 text-lg">No books found matching your criteria.</p>
<a href="{{ route('shop') }}" class="text-primary hover:underline">Clear filters</a>
</div>
@else
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
@foreach($books as $book)
<!-- Book Card -->
<div class="bg-white dark:bg-slate-800 rounded-xl p-4 shadow-lg flex flex-col gap-3 hover:shadow-xl transition-shadow">
<div class="aspect-[3/4] w-full rounded-lg overflow-hidden bg-slate-100 mb-2">
@if($book->cover_url)
<img class="w-full h-full object-contain" data-alt="{{ $book->title }} book cover" src="{{ $book->cover_url }}"/>
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

<!-- Pagination -->
<div class="mt-8">
{{ $books->appends(request()->query())->links() }}
</div>
@endif
</main>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const applyFiltersBtn = document.getElementById('apply-filters');
    const clearFiltersBtn = document.getElementById('clear-filters');

    applyFiltersBtn.addEventListener('click', function() {
        const selectedCategories = Array.from(document.querySelectorAll('.category-filter:checked')).map(cb => cb.value);

        const url = new URL(window.location);
        // reset pagination when applying new filters
        url.searchParams.delete('page');
        // clear existing category params
        Array.from(url.searchParams.keys()).forEach(key => {
            if (key.startsWith('category')) url.searchParams.delete(key);
        });

        selectedCategories.forEach(cat => {
            url.searchParams.append('category[]', cat);
        });

        window.location.href = url.toString();
    });

    clearFiltersBtn.addEventListener('click', function() {
        window.location.href = '{{ route("shop") }}';
    });
});
</script>

@endsection
