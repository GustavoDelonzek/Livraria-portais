<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['author:id,name', 'publisher:id,name'])->get();

    $booksWithNames = $books->map(function ($book) {
        $book->author_name = $book->author->name ?? null; 
        $book->publisher_name = $book->publisher->name ?? null; 
        unset($book->author, $book->publisher); 

        return $book;
    });

    return response()->json(["books" => $booksWithNames]);
    }
    
    public function create(Request $request)
    {
        $book = Book::create($request->all());
        return response()->json(['message' => 'Book created successfully', 'book' => $book],  201);
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
