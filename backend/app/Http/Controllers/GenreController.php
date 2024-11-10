<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        // Retorna todos os gêneros
        $genres = Genre::all();
        return response()->json(["genres" => $genres]);
    }

    public function store(Request $request)
    {
        // Valida os dados recebidos
        $request->validate([
            'name' => 'required|string|max:255|unique:genres,name', // Gênero único
        ]);

        // Cria um novo gênero
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
        // Encontra o gênero pelo ID
        $genre = Genre::findOrFail($id);

        // Valida os dados recebidos
        $request->validate([
            'name' => 'required|string|max:255|unique:genres,name,' . $genre->id, // Exclui o gênero atual da validação de unicidade
        ]);

        // Atualiza o gênero
        $genre->name = $request->name;
        $genre->save();

        return response()->json([
            'message' => 'Genre updated successfully',
            'genre' => $genre
        ], 200);
    }

    public function destroy($id)
    {
        // Encontra o gênero pelo ID
        $genre = Genre::find($id);

        // Verifica se o gênero existe
        if ($genre) {
            $genre->delete();
            return response()->json(['message' => 'Genre deleted successfully', 'code' => 200]);
        } else {
            return response()->json(['message' => "Genre with id: $id does not exist!", 'code' => 404]);
        }
    }
}