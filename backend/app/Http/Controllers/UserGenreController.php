<?php

namespace App\Http\Controllers;

use App\Models\UserGenre;
use Illuminate\Http\Request;

class UserGenreController extends Controller
{
    public function saveGenres(Request $request)
    {
        $userId = $request->user_id;
        $genres = $request->genres;

        UserGenre::where('user_id', $userId)->delete();

        foreach ($genres as $genreId) {
            UserGenre::create([
                'user_id' => $userId,
                'genre_id' => $genreId
            ]);
        }

        return response()->json(['message' => 'Gêneros salvos com sucesso']);
    }
}
