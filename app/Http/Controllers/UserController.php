<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() // Leer todos los usuarios
    {
        $users = User::with('role')->get(); // Incluye rol
        return response()->json($users, 200);
    }

    public function store(Request $request) // Crear usuario
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role_id' => 'required|exists:roles,id',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Encriptar password
            'role_id' => $request->role_id,
        ]);
        return response()->json($user, 201);
    }

    public function show($id) // Leer un usuario
    {
        $user = User::with('role')->findOrFail($id);
        return response()->json($user, 200);
    }

    public function update(Request $request, $id) // Actualizar usuario
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'string',
            'email' => 'email|unique:users,email,' . $id,
            'role_id' => 'exists:roles,id',
        ]);
        $user->update($request->only(['name', 'email', 'role_id']));
        return response()->json($user, 200);
    }

    public function destroy($id) // Eliminar usuario
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'Usuario eliminado'], 200);
    }
}
