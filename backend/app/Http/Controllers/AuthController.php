<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\ResponseTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class AuthController extends Controller
{
    public function register(Request $request)
    {
        request()->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string'
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        return $user;
    }

    public function login(Request $request)
    {
        // Validação da entrada
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Credenciais fornecidas
        $credentials = $request->only('email', 'password');
    
        try {
            // Tentar gerar o token JWT com base nas credenciais
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['message' => 'Credenciais inválidas'], 401);
            }
        } catch (JWTException $e) {
            // Retornar erro caso haja problema ao gerar o token
            return response()->json(['message' => 'Não foi possível criar o token'], 500);
        }
    
        // Retornar o token JWT junto com os dados do usuário
        $user = Auth::user();
    
        return response()->json([
            'user' => $user,
            'token' => $token,
            'role' => $user->role, // Retorna o papel do usuário
        ], 200);
    }

    public function logout(Request $request)
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json(['message' => 'Logout realizado com sucesso']);
    }


}