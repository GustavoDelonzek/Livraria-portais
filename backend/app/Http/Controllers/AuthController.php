<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\ResponseTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    
    public function login(Request $request){
        $hashedPassword = hash::make($request->password);
        if(Auth::attempt($request->only('email', 'password'))){
            return response('Authorized', 200, ['token' => $request->user()->createToken('authToken')->plainTextToken]);
        }
        return response('Não autorizado', 403);
    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response('Deslogado', 200);
    }
}
