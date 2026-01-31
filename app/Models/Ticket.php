<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'status', 'priority', 'client_id', 'assigned_to'];

    // Relaciones
    public function client()
    {
        return $this->belongsTo(Client::class); // Un ticket pertenece a un cliente
    }

    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to'); // Un ticket pertenece a un usuario asignado
    }

    public function files()
    {
        return $this->hasMany(TicketFile::class); // Un ticket tiene muchos archivos
    }
}
