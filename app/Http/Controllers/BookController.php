<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$books = Book::all();
        $books = Book::with('author')->orderBy('title', 'asc')->get();

        return view('books.index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title'               => 'required|string|min:5|max:50', // Minimálne 5 znakov, maximálne 50 znakov
            'description'         => 'required|string',
            'genre'               => 'required|string|max:15',       // Maximálne 15 znakov
            'author_id'           => 'required|integer',
        ];

        $validated = $request->validate($rules);
        
        try {
            $d = Book::create([
                'title'               => $request['title'],
                'description'         => $request['description'],
                'genre'               => $request['genre'],
                'author_id'           => $request['author_id'],
            ]);
            session()->flash('success', 'Book created');
            return redirect()->route('books.index');
        } catch (Exception $e) {
            session()->flash('failure', $e->getMessage());
            return redirect()->back()->withInput();
        }  
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit')->with('book', Book::find($book->id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $rules = [
            'title'              => 'required|string|min:5|max:50', // Minimálne 5 znakov, maximálne 50 znakov
            'description'        => 'required|string',
            'genre'              => 'required|string|max:15',       // Maximálne 15 znakov
            'author_id'          => 'required|integer',
        ];

        $validated = $request->validate($rules);

        $d = Book::find($book->id);
        $d->title                = $request->title;
        $d->description          = $request->description;
        $d->genre                = $request->genre;
        $d->author_id            = $request->author_id;

        try {
            $d->save();
            session()->flash('success', 'Book <b>' . $book->title . '</b> updated');
            return redirect()->route('books.index');
        } catch (Exception $e) {
            session()->flash('failure', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //Book::find($book->id)->delete();            
        //return redirect()->route('books.index');

        try {
            $book->delete();
            session()->flash('success', 'Book <b>' . $book->title . '</b> deleted');
            return redirect()->route('books.index');
        } catch (Exception $e) {
            session()->flash('failure', $e->getMessage());
            return redirect()->back();
        } 
    }
}
