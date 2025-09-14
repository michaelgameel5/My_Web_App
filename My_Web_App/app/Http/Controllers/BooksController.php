<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    
    public function create()
    {
        return view('books.create');
    }
    
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
        ]);
        
        Book::create($validated);
        
        return redirect()->route('books.index')->with('success', 'Book added successfully.');
    }

    
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
        ]);
        
        $book = Book::findOrFail($id);
        $book->update($validated);
        
        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    
    public function delete($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
    

}
