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
            return response('Authorized', 200);
        }
        return response($request->email, 403);
    }
    public function logout(Request $request){}
}
