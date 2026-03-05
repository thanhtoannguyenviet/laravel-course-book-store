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
            'bio'         => 'nullable|string',
            'avatar_url'  => 'nullable|url',
            'is_active'   => 'boolean',
        ]);

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
