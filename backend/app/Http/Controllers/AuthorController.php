<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Database\Seeders\AuthorSeeder;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return response()->json(["authors" => $authors]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'bio' => 'nullable|string',
            'date_of_birth' => 'required|date',
            'nationality' => 'required|string'
        ]);

        $author = new Author();
        $author->name = $request->name;
        $author->bio = $request->bio;
        $author->date_of_birth = $request->date_of_birth;
        $author->nationality = $request->nationality;
        $author->save();

        return response()->json([
            'message' => 'Author created successfully',
            'author' => $author
        ], 200);
    }


    public function get_author($id)
    {
        $author = Author::find($id);

        return response()->json($author);
    }


    public function update($id, Request $request)
    {
        $author = Author::where('id', $id)->first();

        if (!$author) {
            return response()->json([
                'message' => 'Author not found'
            ], 404);
        }

        $request->validate([
            'name' => 'required|string',
            'bio' => 'nullable|string',
            'date_of_birth' => 'required|date',
            'nationality' => 'required|string'
        ]);

        $author->name = $request->name;
        $author->bio = $request->bio;
        $author->date_of_birth = $request->date_of_birth;
        $author->nationality = $request->nationality;
        $author->save();

        return response()->json([
            'message' => 'Author updated successfully',
            'author' => $author
        ], 200);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $authors = Author::where('name', 'like', "%$query%")->get();

        

        return response()->json(['authors' => $authors]);
    }

    public function destroy($id)
    {
        $author = Author::find($id);

        if ($author) {
            $author->delete();
            return response()->json(['message' => 'Author deleted successfully', 'code' => 200]);
        } else {
            return response()->json(['message' => "Author with id: $id does not exist!", 'code' => 404]);
        }
    }


}
