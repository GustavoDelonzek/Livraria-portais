<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Carbon\Carbon;
use Http;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
{
    $books = Book::with(['author:id,name', 'publisher:id,name', 'genres:id,name'])->get();

    $booksWithNames = $books->map(function ($book) {
        $book->author_name = $book->author->name ?? null;
        $book->publisher_name = $book->publisher->name ?? null;

        $book->genre_names = $book->genres->pluck('name'); 
        
        unset($book->author, $book->publisher, $book->genres);

        return $book;
    });

    return response()->json(["books" => $booksWithNames]);
}

public function search(Request $request)
{
    $query = $request->input('query');
    
    $books = Book::with(['author:id,name', 'publisher:id,name', 'genres:id,name'])
        ->where('title', 'like', "%$query%")
        ->get();

    $booksWithNames = $books->map(function ($book) {
        $book->author_name = $book->author->name ?? null;
        $book->publisher_name = $book->publisher->name ?? null;
        $book->genre_names = $book->genres->pluck('name'); 
        
        unset($book->author, $book->publisher, $book->genres);

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
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,bmp,webp|max:2048'
        ]);

        $imgBBKey = env('IMGBB_API_KEY');
        if (!$imgBBKey) {
            throw new \Exception('IMGBB_API_KEY não está configurada no ambiente.');
        }

        $response = Http::withOptions(['verify' => false])
            ->asForm()
            ->post('https://api.imgbb.com/1/upload', [
                'key' => $imgBBKey,
                'image' => base64_encode(file_get_contents($request->file('image')))
            ]);

        if ($response->failed()) {
            return response()->json(['error' => 'Falha no upload da imagem'], 500);
        }

        $imgUrl = $response->json('data.display_url');

        $book = new Book();
        $book->title = $request->title;
        $book->author_id = $request->author_id;
        $book->publisher_id = $request->publisher_id;
        $book->published_year = $request->published_year;
        $book->price = $request->price;
        $book->stock = $request->stock;
        $book->description = $request->description;
        $book->img_url = $imgUrl;
        $book->save();

        $book->genres()->attach($request->genres);

        $book->load('author', 'publisher', 'genres');

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

    public function bookNewRelease(){
        $twoWeeksAgo = Carbon::now()->subWeeks(2);

        $books = Book::with(['author:id,name', 'publisher:id,name', 'genres:id,name'])
                     ->where('created_at', '>=', $twoWeeksAgo)
                     ->orderBy('created_at', 'desc')
                     ->get();
    
        return response()->json(["books" => $books]);
    }

    public function update($id, Request $request)
    {
        $book = Book::findOrFail($id); 
    
        $request->validate([
            'title' => 'required|string',
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
            'published_year' => 'required|digits:4',
            'genres' => 'required|array',  
            'genres.*' => 'exists:genres,id', 
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,bmp,webp|max:2048' 
        ]);
    
        if ($request->hasFile('image')) {
            $imgBBKey = env('IMGBB_API_KEY');
            if (!$imgBBKey) {
                throw new \Exception('IMGBB_API_KEY não está configurada no ambiente.');
            }
    
            $response = Http::withOptions(['verify' => false])
                ->asForm()
                ->post('https://api.imgbb.com/1/upload', [
                    'key' => $imgBBKey,
                    'image' => base64_encode(file_get_contents($request->file('image')))
                ]);
    
            if ($response->failed()) {
                return response()->json(['error' => 'Falha no upload da imagem'], 500);
            }
    
            $imgUrl = $response->json('data.display_url');
            $book->img_url = $imgUrl; 
        } 
    
        $book->title = $request->title;
        $book->author_id = $request->author_id;
        $book->publisher_id = $request->publisher_id;
        $book->published_year = $request->published_year;
        $book->price = $request->price;
        $book->stock = $request->stock;
        $book->description = $request->description;
        $book->save();
    
        $book->genres()->sync($request->genres);
    
        $book->load('author', 'publisher', 'genres');
    
        return response()->json([
            'message' => 'Book updated successfully',
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
