<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$authors = Author::all(); // vygeneruje všetky údaje z tabuľky authors 
        //$authors = Author::orderBy('lastname', 'ASC')->get(); // vygeneruje všetky údaje z tabuľky authors a zoradí ich podľa priezviska
        $authors = Author::orderBy('lastname', 'ASC')->orderBy('firstname', 'ASC')->get(); // vygeneruje všetky údaje z tabuľky authors a zoradí ich podľa priezviska a mena      
        return view('authors.index')->with('authors', $authors);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        //
    }
}
