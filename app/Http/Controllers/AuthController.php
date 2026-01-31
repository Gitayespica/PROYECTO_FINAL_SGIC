<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  
use App\Models\User;  

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validar entrada: email y password requeridos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            return response()->json(['message' => 'Login exitoso', 'user' => $user], 200);
        }

        return response()->json(['message' => 'Credenciales incorrectas'], 401);
    }
}
