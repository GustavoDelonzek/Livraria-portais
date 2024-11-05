<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validação dos dados de entrada
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tentativa de login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Login bem-sucedido
            $user = Auth::user();

            // Verifica se o usuário é admin
            if ($user->is_admin) {
                return response()->json([
                    'message' => 'Login bem-sucedido! Você é um administrador.',
                    'redirect' => '/admin/dashboard' // URL para redirecionar o admin
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Login bem-sucedido! Você é um usuário comum.',
                    'redirect' => '/' // URL para redirecionar o usuário comum
                ], 200);
            }
        }

        // Login falhou
        return response()->json(['message' => 'Credenciais inválidas.'], 401);
    }
}