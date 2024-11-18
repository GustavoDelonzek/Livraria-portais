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

    $credentials = $request->only('email', 'password');

    try {
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }
    } catch (JWTException $e) {
        return response()->json(['message' => 'Não foi possível criar o token'], 500);
    }

    $user = Auth::user();

    $customClaims = [
        'role' => $user->role, 
    ];

    $token = JWTAuth::claims($customClaims)->fromUser($user);

    return response()->json([
        'user' => $user,
        'token' => $token,
    ], 200);
}

    public function logout(Request $request)
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json(['message' => 'Logout realizado com sucesso'], 200);
    }


    public function getTotalUsers()
    {
        // Conta todos os usuários no banco
        $totalUsers = User::count();

        return response()->json([
            'total_users' => $totalUsers
        ], 200);
    }


}