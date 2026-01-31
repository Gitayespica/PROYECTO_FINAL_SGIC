<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index() { return response()->json(Client::all(), 200); }
    public function store(Request $request) {
        $request->validate(['name' => 'required', 'email' => 'required|email|unique:clients', 'phone' => 'nullable']);
        $client = Client::create($request->all());
        return response()->json($client, 201);
    }
    public function show($id) { return response()->json(Client::findOrFail($id), 200); }
    public function update(Request $request, $id) {
        $client = Client::findOrFail($id);
        $request->validate(['name' => 'string', 'email' => 'email|unique:clients,email,' . $id, 'phone' => 'nullable']);
        $client->update($request->all());
        return response()->json($client, 200);
    }
    public function destroy($id) { Client::findOrFail($id)->delete(); return response()->json(['message' => 'Cliente eliminado'], 200); }
}