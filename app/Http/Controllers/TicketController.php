<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function index() { return response()->json(Ticket::with('client', 'assignedUser')->get(), 200); }
    public function store(Request $request) {
        $request->validate([
            'title' => 'required', 'description' => 'required', 'status' => 'required|in:open,in_progress,closed',
            'priority' => 'required|in:low,medium,high', 'client_id' => 'required|exists:clients,id', 'assigned_to' => 'nullable|exists:users,id'
        ]);
        $ticket = Ticket::create($request->all());
        return response()->json($ticket, 201);
    }
    public function show($id) { return response()->json(Ticket::with('client', 'assignedUser', 'files')->findOrFail($id), 200); }
    public function update(Request $request, $id) {
        $ticket = Ticket::findOrFail($id);
        $request->validate([
            'title' => 'string', 'description' => 'string', 'status' => 'in:open,in_progress,closed',
            'priority' => 'in:low,medium,high', 'assigned_to' => 'nullable|exists:users,id'
        ]);
        $ticket->update($request->all());
        return response()->json($ticket, 200);
    }
    public function destroy($id) { Ticket::findOrFail($id)->delete(); return response()->json(['message' => 'Ticket eliminado'], 200); }
}
