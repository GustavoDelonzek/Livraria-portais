<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class OrdersController extends Controller
{
    public function checkout(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.book_id' => 'required|exists:books,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        try {

            $user = JWTAuth::parseToken()->authenticate();

            if (!$user) {
                return response()->json(['error' => 'Usuário não autenticado'], 401);
            }

            $order = Order::create([
                'user_id' => $user->id,
                'total' => 0,
                'status' => 'completed',
            ]);

            $total = 0;

            foreach ($request->items as $item) {
                $book = Book::find($item['book_id']);

                if ($book && $book->stock >= $item['quantity']) {
                    $total += $book->price * $item['quantity'];

                    OrderItem::create([
                        'order_id' => $order->id,
                        'book_id' => $book->id,
                        'quantity' => $item['quantity'],
                        'price' => $book->price,
                    ]);

                    $book->decrement('stock', $item['quantity']);
                } else {
                    return response()->json(['error' => 'Estoque insuficiente para o livro: ' . $book->title], 400);
                }
            }

            $order->update(['total' => $total]);

            DB::commit();

            return response()->json([
                'message' => 'Compra realizada com sucesso!',
                'order' => $order
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            \Log::error('Erro ao processar a compra', [
                'error' => $e->getMessage(),
                'request' => $request->all(),
            ]);

            return response()->json(['error' => 'Erro ao processar a compra.'], 500);
        }
    }

    public function getTotalBooksSold()
    {
        try {
            $totalBooksSold = OrderItem::sum('quantity');

            return response()->json(['total' => $totalBooksSold]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao calcular total de livros vendidos.'], 500);
        }
    }

    public function getTotalOrdersValue()
    {
        try {
            $totalOrdersValue = Order::sum('total');

            return response()->json(['total' => $totalOrdersValue]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao calcular o valor total dos pedidos.'], 500);
        }
    }

    public function getAllSales()
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();

            if (!$user) {
                return response()->json(['error' => 'Usuário não autenticado'], 401);
            }


            $sales = Order::orderBy('created_at', 'desc')->get();

            return response()->json(['sales' => $sales]);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['error' => 'Token inválido ou ausente'], 401);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao recuperar todas as vendas.'], 500);
        }
    }


    public function userOrders()
    {
        DB::beginTransaction();
        $user = JWTAuth::parseToken()->authenticate();

        if (!$user) {
            return response()->json(['error' => 'Usuário não autenticado'], 401);
        }

        $orders = Order::where('user_id', $user->id)
            ->with('orderItems.book')
            ->get();
        DB::commit();
        return response()->json(['orders' => $orders]);

    }


    public function hasPurchased(Request $request, $bookId)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();

            if (!$user) {
                return response()->json(['error' => 'Usuário não autenticado'], 401);
            }

            $hasPurchased = OrderItem::whereHas('order', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->where('book_id', $bookId)->exists();

            return response()->json(['hasPurchased' => $hasPurchased]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao verificar compra.'], 500);
        }
    }

}
