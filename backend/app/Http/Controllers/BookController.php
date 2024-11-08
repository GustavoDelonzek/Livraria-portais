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

    public function search(Request $request)
    {
        $query = $request->input('query');
        $books = Book::where('title', 'like', "%$query%")->get();

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
        $request->validate([
            'title' => 'required|string',
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
            'published_year' => 'required|digits:4',
            'genre' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable|string'
        ]);

        $book = new Book();
        $book->title = $request->title;
        $book->author_id = $request->author_id;
        $book->publisher_id = $request->publisher_id;
        $book->published_year = $request->published_year;
        $book->genre = $request->genre;
        $book->price = $request->price;
        $book->stock = $request->stock;
        $book->description = $request->description;
        $book->save();


        $book->load('author', 'publisher');

        return response()->json([
            'message' => 'Book created successfully',
            'book' => $book
        ], 200);
    }


    public function updateStock(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $operation = $request->input('operation'); 
        $quantity = $request->input('quantity');

        if ($quantity <= 0) {
            return response()->json(['error' => 'A quantidade deve ser maior que zero.'], 400);
        }

        $result = $book->updateStock($quantity, $operation);

        if ($result === true) {
            return response()->json(['message' => 'Estoque atualizado com sucesso!']);
        } else {
            return response()->json(['error' => $result], 400);
        }
    }

    public function get_book($id)
    {
        $book = Book::find($id);

        return response()->json($book);
    }

    public function update($id, Request $request)
    {
        $book = Book::where('id', $id)->first();

        $request->validate([
            'title' => 'required|string',
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
            'published_year' => 'required|digits:4',
            'genre' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable|string'
        ]);

        $book->title = $request->title;
        $book->author_id = $request->author_id;
        $book->publisher_id = $request->publisher_id;
        $book->published_year = $request->published_year;
        $book->genre = $request->genre;
        $book->price = $request->price;
        $book->stock = $request->stock;
        $book->description = $request->description;
        $book->save();


        $book->load('author', 'publisher');

        return response()->json([
            'message' => 'Book Updated successfully',
            'book' => $book
        ], 200);

    }
    public function destroy($id)
    {
        $book = Book::find($id);
        if ($book) {
            $book->delete();
            return response()->json(['message' => 'Book deleted successfully', 'code' => 200]);
        } else {
            return response()->json(['message' => "Book with id: $id does not exist!", 'code' => 500]);
        }

    }

}
