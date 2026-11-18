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
        $books = Book::with('category')->paginate(8);

        return view('catalog', compact('books'));
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $single_book = Book::findOrFail($id);

        return view('single_book', compact('single_book'));
    }
}
