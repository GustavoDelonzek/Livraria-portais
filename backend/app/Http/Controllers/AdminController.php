<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        return response()->json(['message' => 'Bem-vindo à página inicial do Admin']);
    }
}