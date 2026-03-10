@extends('layout')

@section('content')

<!-- Search Section -->
<section class="px-4 py-2">
<form method="GET" action="{{ route('home') }}">
<div class="relative flex items-center">
<span class="material-symbols-outlined absolute left-4 text-slate-400">search</span>
<input class="w-full pl-12 pr-4 py-3 bg-white dark:bg-slate-800 border-none rounded-xl shadow-sm focus:ring-2 focus:ring-primary text-sm" placeholder="Search books, authors, genres..." type="text" name="search" value="{{ $searchQuery ?? '' }}"/>
</div>
</form>
</section>
@if($searchResults)
<!-- Search Results Section -->
<section class="px-4 py-4">
<div class="flex items-center justify-between mb-4">
<h3 class="text-lg font-bold tracking-tight">Search Results for "{{ $searchQuery }}"</h3>
<a class="text-sm font-medium text-primary" href="{{ route('home') }}">Clear Search</a>
</div>
@if($searchResults->isEmpty())
<p class="text-slate-500">No books found matching your search.</p>
@else
<div class="grid grid-cols-2 gap-4">
@foreach($searchResults as $book)
<!-- Book Card -->
<div class="bg-white dark:bg-slate-800 rounded-xl p-3 shadow-sm flex flex-col gap-2">
<div class="aspect-[2/3] w-full rounded-lg overflow-hidden bg-slate-100 mb-1">
@if($book->cover_url)
<img class="w-full h-full object-cover" data-alt="{{ $book->title }} book cover" src="{{ $book->cover_url }}"/>
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
@endif
</section>
@endif
</section>
<!-- Categories Section -->
<section class="py-4">
<div class="flex items-center justify-between px-4 mb-3">
<h3 class="text-lg font-bold tracking-tight">Categories</h3>
<a class="text-sm font-medium text-primary" href="{{ route('shop') }}">View all</a>
</div>
<div class="flex gap-3 overflow-x-auto px-4 no-scrollbar pb-2">
@foreach($categories as $index => $category)
<button class="flex-shrink-0 px-5 py-2 rounded-full {{ $index == 0 ? 'bg-primary text-white' : 'bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-400' }} text-sm font-medium shadow-sm">{{ $category->name }}</button>
@endforeach
</div>
</section>
<!-- Best Sellers Section -->
<section class="px-4 py-4">
<div class="flex items-center justify-between mb-4">
<h3 class="text-lg font-bold tracking-tight">Best Sellers</h3>
<a class="text-sm font-medium text-primary" href="{{ route('shop') }}">See All</a>
</div>
<div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
@foreach($featuredBooks as $book)
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
</section>

@endsection
