<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

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
        // Criação da ordem
        $order = Order::create([
            'user_id' => 1, 
            'total' => 0,
            'status' => 'completed',
        ]);

        $total = 0;

        // Processando cada item do pedido
        foreach ($request->items as $item) {
            $book = Book::find($item['book_id']);
            
            // Verifica se o livro existe e tem estoque suficiente
            if ($book && $book->stock >= $item['quantity']) {
                $total += $book->price * $item['quantity'];
                
                // Cria o item do pedido
                OrderItem::create([
                    'order_id' => $order->id,
                    'book_id' => $book->id,
                    'quantity' => $item['quantity'],
                    'price' => $book->price,
                ]);
                
                // Atualiza o estoque
                $book->decrement('stock', $item['quantity']);
            } else {
                // Caso o livro não tenha estoque suficiente
                return response()->json(['error' => 'Estoque insuficiente para o livro: ' . $book->title], 400);
            }
        }

        // Atualiza o total do pedido
        $order->update(['total' => $total]);

        DB::commit();

        return response()->json([
            'message' => 'Compra realizada com sucesso!',
            'order' => $order
        ]);
    } catch (\Exception $e) {
        DB::rollBack();

        // Log de erro
        \Log::error('Erro ao processar a compra', [
            'error' => $e->getMessage(),
            'request' => $request->all(),
        ]);

        return response()->json(['error' => 'Erro ao processar a compra.'], 500);
    }
}

    
    

    public function userOrders()
    {
        $orders = Order::where('user_id', 1)
            ->with('orderItems.book')
            ->get();

        return response()->json(['orders' => $orders]);
    }
}
