<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::all();
        return response()->json(["publishers" => $publishers]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'website' => 'nullable|string',
            'contact' => 'required|string'
        ]);

        $publisher = new Publisher();
        $publisher->name = $request->name;
        $publisher->address = $request->address;
        $publisher->website = $request->website;
        $publisher->contact = $request->contact;
        $publisher->save();

        return response()->json([
            'message' => 'Publisher created successfully',
            'publisher' => $publisher
        ], 200);
    }

    public function get_publisher($id)
    {
        $publisher = Publisher::find($id);

        if ($publisher) {
            return response()->json($publisher);
        } else {
            return response()->json(['message' => 'Publisher not found'], 404);
        }
    }

    public function update($id, Request $request)
    {
        $publisher = Publisher::where('id', $id)->first();

        if (!$publisher) {
            return response()->json([
                'message' => 'Publisher not found'
            ], 404);
        }

        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'website' => 'nullable|string',
            'contact' => 'required|string'
        ]);

        $publisher->name = $request->name;
        $publisher->address = $request->address;
        $publisher->website = $request->website;
        $publisher->contact = $request->contact;
        $publisher->save();

        return response()->json([
            'message' => 'Publisher updated successfully',
            'publisher' => $publisher
        ], 200);
    }

    public function destroy($id)
    {
        $publisher = Publisher::find($id);

        if ($publisher) {
            $publisher->delete();
            return response()->json(['message' => 'Publisher deleted successfully', 'code' => 200]);
        } else {
            return response()->json(['message' => "Publisher with id: $id does not exist!", 'code' => 404]);
        }
    }

}
