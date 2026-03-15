<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // list all authors
        $authors = \App\Models\Author::all();
        return view('admin.authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name'   => 'nullable|string|max:255',
            'pen_name'    => 'required|string|max:255',
            'email'       => 'required|email|unique:authors,email',
            'birth_date'  => 'nullable|date',
            'nationality' => 'nullable|string|max:100',
            'bio'         => 'required|string',
            'is_active'   => 'boolean',
            'avatar_url'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('avatar_url')) {
            $path = $request->file('avatar_url')->store('images', 'public');
            $data['avatar_url'] = asset('storage/' . $path);
        }

        $author = \App\Models\Author::create($data);

        return redirect()->route('admin.authors.show', $author);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $author = \App\Models\Author::findOrFail($id);
        return view('admin.authors.show', compact('author'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $author = \App\Models\Author::findOrFail($id);
        return view('admin.authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $author = \App\Models\Author::findOrFail($id);

        $data = $request->validate([
            'full_name'   => 'nullable|string|max:255',
            'pen_name'    => 'required|string|max:255',
            'email'       => 'required|email|unique:authors,email,' . $author->id,
            'birth_date'  => 'nullable|date',
            'nationality' => 'nullable|string|max:100',
            'bio'         => 'required|string',
            'is_active'   => 'boolean',
            'avatar_url'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('avatar_url')) {
            $path = $request->file('avatar_url')->store('images', 'public');
            $data['avatar_url'] = asset('storage/' . $path);
        }

        $author->update($data);

        return redirect()->route('admin.authors.show', $author);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = \App\Models\Author::findOrFail($id);
        $author->delete();

        return redirect()->route('admin.authors.index');
    }
}
