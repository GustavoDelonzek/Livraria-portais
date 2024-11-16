<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Review;
use Auth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class ReviewController extends Controller
{
    public function index($book_id)
{
    $reviews = Review::with(['user', 'book'])
                    ->where('book_id', $book_id)  
                    ->get();

    return response()->json(['reviews' => $reviews], 200);
}
    public function show($id)
    {
        $review = Review::with(['user', 'book'])->find($id);

        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        return response()->json($review);
    }

    public function store(Request $request, $book_id)
{
    $request->validate([
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'nullable|string|max:500',
    ]);

    try {
        $user = JWTAuth::parseToken()->authenticate();

        if (!$user) {
            return response()->json(['error' => 'Usuário não autenticado'], 401);
        }

        $userId = $user->id;
        \Log::info('User ID: ' . $userId);

    } catch (JWTException $e) {
        return response()->json(['error' => 'Token inválido ou expirado'], 401);
    }

    $existingReview = Review::where('user_id', $userId)
                            ->where('book_id', $book_id)
                            ->first();

    if ($existingReview) {
        return response()->json(['error' => 'Você já deixou um comentário para este livro.'], 403);
    }

   
    $review = new Review();
    $review->user_id = $userId;
    $review->book_id = $book_id;
    $review->rating = $request->rating;
    $review->comment = $request->comment;
    $review->save();

    return response()->json([
        'message' => 'Comentário criado com sucesso!',
        'review' => $review
    ], 201);
}


    public function update(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $review = Review::find($id);

        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->save();

        return response()->json([
            'message' => 'Review updated successfully',
            'review' => $review
        ], 200);
    }

    public function destroy($id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        $review->delete();

        return response()->json([
            'message' => 'Review deleted successfully'
        ], 200);
    }
}
