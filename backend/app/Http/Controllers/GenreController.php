<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return response()->json(["genres" => $genres]);
    }

    public function getGenresByCategory()
    {
        $genresByCategory = Genre::select('id', 'name', 'category')
                                 ->orderBy('category')
                                 ->get()
                                 ->groupBy('category');

        return response()->json($genresByCategory);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:genres,name',
        ]);

        $genre = new Genre();
        $genre->name = $request->name;
        $genre->save();

        return response()->json([
            'message' => 'Genre created successfully',
            'genre' => $genre
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $genre = Genre::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:genres,name,' . $genre->id,  
        ]);

        $genre->name = $request->name;
        $genre->save();

        return response()->json([
            'message' => 'Genre updated successfully',
            'genre' => $genre
        ], 200);
    }

    public function destroy($id)
    {
        $genre = Genre::find($id);

        if ($genre) {
            $genre->delete();
            return response()->json(['message' => 'Genre deleted successfully', 'code' => 200]);
        } else {
            return response()->json(['message' => "Genre with id: $id does not exist!", 'code' => 404]);
        }
    }
}