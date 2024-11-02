<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }
    
    public function create(Request $request)
    {
        $book = Book::create($request->all());
        return response()->json(['message' => 'Book created successfully', 'book' => $book], 201);
    }

    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        return response()->json(['message' => 'Book updated successfully', 'book' => $book], 200);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json(['message' => 'Book deleted successfully'], 200);
    }

}
